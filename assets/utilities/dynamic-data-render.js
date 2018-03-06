(function( $ ){
    var DynDataSource = function( container, settings ){
        this.items = settings.initItems;
        this.template = settings.template;
        this.container = container;
        this.events = settings.events;
        this.autoRender = settings.autoRender;
    };

    DynDataSource.prototype.get = function(idx){
    /// mengembalikan item ke-idx
        return this.items[idx];
    };

    DynDataSource.prototype.push = function(item){
    /// memasukan item baru ke belakang list
        this.items.push(item);
    /// melakukan render setelah data dimasukan jika opsi 'auto render' bernilai 'true'
        if(this.autoRender === true){
            this.render();
        }
    };

    DynDataSource.prototype.remove = function(idx){
    /// menghapus item ke-idx
        this.items.splice(idx,1);
    /// melakukan render setelah data dihapus jika opsi 'auto render' bernilai 'true'
        if(this.autoRender === true){
            this.render();
        }
    };

    DynDataSource.prototype.hide = function(idx){
    /// menyembunyikan item ke-idx
        this.items[idx].___dynHide = true;
    /// melakukan render setelah data disembunyikan jika opsi 'auto render' bernilai 'true'
        if(this.autoRender === true){
            this.render();
        }
    };

    DynDataSource.prototype.show = function(idx){
    /// menampilkan kembali item ke-idx
        this.items[idx].___dynHide = false;
    /// melakukan render setelah data ditampilkan kembali jika opsi 'auto render' bernilai 'true'
        if(this.autoRender === true){
            this.render();
        }
    };


    DynDataSource.prototype.stringify = function(){
    /// menghasilkan string JSON dari 'data store'
        return JSON.stringify(this.items);
    }

    DynDataSource.prototype.render = function(){
        var self = this;
        var templateKeys = [];
        var elements = [];
    /// untuk setiap elemen yang memiliki atribut 'data-dyn-item' ambil nilainya untuk menjadi key/field dari data
        ($($.parseHTML(this.template)).find('[data-dyn-item]')).each(function(){
            templateKeys.push($(this).attr('data-dyn-item'));
        });
    /// untuk object data yang terdapat dalam data store, lakukan perulangan berikut
        this.items.forEach(function(item,idx){
        /// jika flag '__dynHide' bernilai true, data tidak akan dirender
            if(item.___dynHide === true) return;
        /// buatlah elemen html dari 'template string'
            var currTempItem = $($.parseHTML(self.template));
        /// untuk setiap field data lakukan perulangan berikut
            templateKeys.forEach(function(key){
            /// ambil semua elemen yang memilki 'key' tertentu
                var curElem = $(currTempItem.find('[data-dyn-item="' + key + '"]'));
                if(curElem.is('input') || curElem.is('textarea')){
                /// jika elemen merupakan elemen 'input' atau 'textarea'
                    curElem.val(item.data[key]);
                }else{
                    curElem.html(item.data[key]);
                }
            });
        /// untuk elemen yang memiliki atribut 'data-dyn-index', isilah nilainya dengan index data saat ini
            currTempItem.find('[data-dyn-index]').attr('data-dyn-index',idx);
        /// masukan elemen yang baru di buat, ke 'array of element' yang akan dirender
            elements.push(currTempItem);
        });
    /// mengosongkan target render
        this.container.html('');
    /// merender elemen-elemen ke target
        this.container.append(elements);
    /// daftarkan event-event untuk setiap elemen yang dirender
        this.events.forEach(function(evItem){
            $(document).off(evItem[0],evItem[1]);
            $(document).on(evItem[0],evItem[1],evItem[2].bind(self));
        });
    };


    $.fn.DynDataRender = function( options ){
        var settings = $.extend({
            initItems : [],
            events : [],
            autoRender : true
        },options);
    /// Kembalikan object 'store' baru
        return new DynDataSource(this,settings);
    };
})($);
