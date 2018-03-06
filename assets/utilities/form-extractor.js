(function( $ ){
    $.fn.formClean = function( options ){
    /// kosongkan isi semua elemen 'input','textarea',dan 'select'
        this.find('input,textarea,select').not("[type='submit']").val('');
    };
    $.fn.formExtract = function( options ){
        var formItems = null;
        var selectItems = null;
        var formState = {};
        var resultState = {};
        var attrIdentifier = null;
        var settings = $.extend({
            useName : false,
            catchSelectLabel : false,
            items : null,
            autoclean : true
        },options);
        if(settings.useName === true){
        /// cari semua elemen 'input' dan 'textarea' yang memiliki atribut 'name'
             formItems = this.find('input[name],textarea[name]').not("[type='submit']");
        /// cari semua elemen 'select' yang memiliki tag 'name'
             selectItems = this.find('select[name]');
             attrIdentifier = 'name';
        }else if(settings.useName === false){
        /// cari semua elemen 'input' dan 'textarea' yang memiliki atribut 'id'
             formItems = this.find('input[id],textarea[id]').not("[type='submit']");
        /// cari semua elemen 'select' yang memiliki tag 'id'
             selectItems = this.find('select[id]');
             attrIdentifier = 'id';
        }

    /// untuk setiap elemen 'input' dan 'textarea' lakukan perulangan ini
        formItems.each(function(idx){
            var curr = $(this);
        /// mengambil identifier elemen dari atribut yang tentukan sebelumnya, nilai atribut kosong gunakan index dari element tersebut
            var itemIdentifier = curr.attr(attrIdentifier) || idx;
        /// menyimpan isi elemen dengan melakukan mapping dari identifier elemen ke isi dari elemen
            formState[itemIdentifier] = curr.val();
        });
    /// untuk setiap elemen 'select' lakukan perulangan ini
        selectItems.each(function(idx){
            var curr = $(this);
        /// mengambil identifier elemen dari atribut yang tentukan sebelumnya, nilai atribut kosong gunakan index dari element tersebut
            var itemIdentifier = curr.attr(attrIdentifier) || idx;
        /// menyimpan isi elemen dengan melakukan mapping dari identifier elemen ke isi dari elemen
            formState[itemIdentifier] = curr.val();
        /// jika 'catchSelectLabel' bernilai true maka lakukan mapping terhadap title dari pilihan
            if(settings.catchSelectLabel === true){
                formState[itemIdentifier + '__label'] = curr.children('option:selected').text();
            }
        });
    /// jika setting 'items' di spesifikasikan maka hasil akhir hanya akan berisi nilai elemen-elemen yang identifiernya berada dalam 'items' array
        if(settings.items !== null){
            settings.items.forEach(function(item){
                if(typeof formState[item] === 'undefined'){
                    throw new Error('Item ' + item + ' tidak ditemukan');
                }
                resultState[item] = formState[item];
            });
        }else{
            resultState = formState;
        }
    /// jika opsi 'autoclean' bernilai 'true' kosongkan form
        if(settings.autoclean === true){
            this.formClean();
        }
        return resultState;
    };
})($);
