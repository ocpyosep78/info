Ext.Loader.setConfig({ enabled: true });
Ext.Loader.setPath('Ext.ux', URLS.ext + '/examples/ux');
Ext.require([ 'Ext.grid.*', 'Ext.data.*', 'Ext.ux.grid.FiltersFeature', 'Ext.toolbar.Paging' ]);

Ext.onReady(function() {
	Ext.QuickTips.init();
	
	var raw_data = $('.page-data').text();
	eval('var page_data = ' + raw_data);
	
	var main_store = Ext.create('Ext.data.Store', {
		autoLoad: true, pageSize: 25, remoteSort: true,
        sorters: [{ property: 'name', direction: 'ASC' }],
		fields: [ 'id', 'category_name', 'post_type_name', 'name', 'link', 'is_active' ],
		proxy: {
			type: 'ajax',
			url : URLS.base + 'panel/master/scrape/grid', actionMethods: { read: 'POST' },
			reader: { type: 'json', root: 'rows', totalProperty: 'count' }
		}
	});
	
	var main_grid = new Ext.grid.GridPanel({
		viewConfig: { forceFit: true }, store: main_store, height: 335, renderTo: 'grid-member',
		features: [{ ftype: 'filters', encode: true, local: false }],
		columns: [ {
					header: 'Name', dataIndex: 'name', sortable: true, filter: true, width: 200, flex: 1
			}, {	header: 'Category', dataIndex: 'category_name', sortable: true, filter: true, width: 200
			}, {	header: 'Post Type', dataIndex: 'post_type_name', sortable: true, filter: true, width: 200
			}, {	header: 'Active', xtype: 'actioncolumn', width: 75, align: 'center',
					items: [ {
						getClass: function(v, meta, rec) {
							if (rec.get('is_active') == 0) {
								this.items[0].tooltip = 'Inactive';
								return 'delIcon';
							} else {
								this.items[0].tooltip = 'Active';
								return 'acceptIcon';
							}
						},
						handler: function(grid, rowIndex, colIndex) {
							var rec = grid.store.getAt(rowIndex);
							var param = { action: 'update', id: rec.data.id, is_active: (rec.data.is_active == 0) ? 1 : 0 }
							Func.ajax({ param: param, url: URLS.base + 'panel/master/scrape/action', callback: function(result) {
								if (result.status) {
									grid.store.load();
								}
							} });
						}
					} ]
		} ],
		tbar: [ {
				text: 'Tambah', iconCls: 'addIcon', tooltip: 'Tambah', handler: function() { main_win({ id: 0 }); }
			}, '-', {
				text: 'Ubah', iconCls: 'editIcon', tooltip: 'Ubah', handler: function() { main_grid.update({ }); }
			}, '-', {
				text: 'Hapus', iconCls: 'delIcon', tooltip: 'Hapus', handler: function() {
					if (main_grid.getSelectionModel().getSelection().length == 0) {
						Ext.Msg.alert('Informasi', 'Silahkan memilih data.');
						return false;
					}
					
					Ext.MessageBox.confirm('Konfirmasi', 'Apa anda yakin akan menghapus data ini ?', main_grid.delete);
				}
			}, '->', {
                id: 'SearchPM', xtype: 'textfield', tooltip: 'Cari', emptyText: 'Cari', listeners: {
                    'specialKey': function(field, el) {
                        if (el.getKey() == Ext.EventObject.ENTER) {
                            var value = Ext.getCmp('SearchPM').getValue();
                            if ( value ) {
								main_grid.load_grid({ namelike: value });
                            }
                        }
                    }
                }
            }, '-', {
				text: 'Reset', tooltip: 'Reset pencarian', iconCls: 'refreshIcon', handler: function() {
					main_grid.load_grid({ });
				}
		} ],
		bbar: new Ext.PagingToolbar( {
			store: main_store, displayInfo: true,
			displayMsg: 'Displaying topics {0} - {1} of {2}',
			emptyMsg: 'No topics to display'
		} ),
		listeners: {
			'itemdblclick': function(model, records) {
				main_grid.update({ });
            }
        },
		load_grid: function(Param) {
			main_store.proxy.extraParams = Param;
			main_store.load();
		},
		update: function(Param) {
			var row = main_grid.getSelectionModel().getSelection();
			if (row.length == 0) {
				Ext.Msg.alert('Informasi', 'Silahkan memilih data.');
				return false;
			}
			
			Ext.Ajax.request({
				url: URLS.base + 'panel/master/scrape/action',
				params: { action: 'get_by_id', id: row[0].data.id },
				success: function(Result) {
					eval('var record = ' + Result.responseText)
					record.id = record.id;
					main_win(record);
				}
			});
		},
		delete: function(Value) {
			if (Value == 'no') {
				return;
			}
			
			Ext.Ajax.request({
				url: URLS.base + 'panel/master/scrape/action',
				params: { action: 'delete', id: main_grid.getSelectionModel().getSelection()[0].data.id },
				success: function(TempResult) {
					eval('var Result = ' + TempResult.responseText)
					
					Ext.Msg.alert('Informasi', Result.message);
					if (Result.status == '1') {
						main_store.load();
					}
				}
			});
		}
	});
	
	function main_win(param) {
		var win = new Ext.Window({
			layout: 'fit', width: 540, height: 215,
			closeAction: 'hide', plain: true, modal: true,
			buttons: [ {
						text: 'Save', handler: function() { win.save(); }
				}, {	text: 'Close', handler: function() {
						win.hide();
				}
			}],
			listeners: {
				show: function(w) {
					var Title = (param.id == 0) ? 'Entry Scrape - [New]' : 'Entry Scrape - [Edit]';
					w.setTitle(Title);
					
					Ext.Ajax.request({
						url: URLS.base + 'panel/master/scrape/view',
						success: function(Result) {
							w.body.dom.innerHTML = Result.responseText;
							
							win.id = param.id;
							win.name = new Ext.form.TextField({ renderTo: 'nameED', width: 400, allowBlank: false, blankText: 'Masukkan Nama' });
							win.link = new Ext.form.TextField({ renderTo: 'linkED', width: 400, allowBlank: false, blankText: 'Masukkan Link' });
							win.category = Combo.Class.Category({ renderTo: 'categoryED', width: 225, allowBlank: false, blankText: 'Masukkan Kategori' });
							win.post_type = Combo.Class.PostType({ renderTo: 'post_typeED', width: 225, value: page_data.POST_TYPE_SINGLE_LINK });
							win.library = new Ext.form.TextField({ renderTo: 'libraryED', width: 225 });
							win.is_active = new Ext.form.Checkbox({ renderTo: 'is_activeED', checked: true });
							
							// Populate Record
							if (param.id > 0) {
								win.name.setValue(param.name);
								win.link.setValue(param.link);
								win.library.setValue(param.library);
								win.category.setValue(param.category_id);
								win.post_type.setValue(param.post_type_id);
								win.is_active.setValue(param.is_active == 1);
							}
							
							aaa = win;
							win = aaa;
						}
					});
				},
				hide: function(w) {
					w.destroy();
					w = win = null;
				}
			},
			save: function() {
				var ajax = new Object();
				ajax.action = 'update';
				ajax.id = win.id;
				ajax.name = win.name.getValue();
				ajax.link = win.link.getValue();
				ajax.library = win.library.getValue();
				ajax.category_id = win.category.getValue();
				ajax.post_type_id = win.post_type.getValue();
				ajax.is_active = (win.is_active.getValue()) ? 1 : 0;
				
				// Validation
				var is_valid = true;
				if (! win.name.validate()) {
					is_valid = false;
				}
				if (! win.link.validate()) {
					is_valid = false;
				}
				if (! win.category.validate()) {
					is_valid = false;
				}
				if (! is_valid) {
					return;
				}
				
				Func.ajax({ param: ajax, url: URLS.base + 'panel/master/scrape/action', callback: function(result) {
					Ext.Msg.alert('Informasi', result.message);
					if (result.status) {
						main_store.load();
						win.hide();
					}
				} });
			}
		});
		win.show();
	}
	
	Renderer.InitWindowSize({ Panel: -1, Grid: main_grid, Toolbar: 70 });
});