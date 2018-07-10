(function( $ ){

/// rules-rules yang diadaptasi dari rules form-validation code igniter
    var validator = {
        required : function( val ){
            return val != '' && val != null;
        },
        min_length : function( val, cons){
            return (val + '').length >= Number(cons);
        },
        max_length : function( val, cons){
            return (val + '').length <= Number(cons);
        },
        exact_length : function( val, cons){
            return (val + '').length == Number(cons);
        }
    };


    /*
     * Options:
     * - formRules = aturan yang akan ditetapkan kepada form
     * - messageSelector = selector blok tempat pesan error akan dirender
     * - labelSelector = selector blok tempat label/judul dari tiap field pada form
     * - showAllMessage = jika terdapat lebih dari satu error pada suatu field maka tampilkan semuanya dan opsi bernilai true
     * - multiMessageSeparator = elemen pemisah dua pesan error (berlaku jika opsi showAllMessage bernilai true)
     * - forceEvaluateIfNotEmpty = akan melakukan validasi halaman diload dan field tidak kosong, seperti setelah melakukan submit form
     */
    $.fn.applyRules = function( options ){

        var settings = $.extend({
            formRules : {},
            messageSelector : 'span.help-block',
            labelSelector : 'label',
            showAllMessage : false,
            multiMessageSeparator : '<br>',
            forceEvaluateIfNotEmpty : true,
            externalErrors : []
        },options)

    /// melakukan mapping terhadap 'field' dengan 'rules' dan 'error message'
        options.formRules.forEach(function(fieldRules){
            var field = fieldRules.field;
            var rules = fieldRules.rules;
            var errors = fieldRules.errors;
            settings.formRules[field] = {
                rules : rules.split('|'),
                errors : errors
            };
        });

    /// membuat elemen menjadi 'unclean' atau atribut clean menjadi false
        var unclean = function(e){
            var elem = $(e.target);
            elem.attr('clean','false');
        }

        var checkRules = function(e){
            var elem = $(e.target);
            var field = elem.attr('name');
            var stat = true;
            var messages = [];
        /// jika elemen berstatus clean atau belum pernah mendapatkan 'focus event' maka elemen tidak akan di validasi
            if(elem.attr('clean') === 'true') return;
            if(settings.formRules[field]){
            /// untuk setiap rules yang dipasangkan dengan elemen tertentu lakukan perulangan berikut
                settings.formRules[field].rules.forEach(function(ruleStr){
                    var ruleArr = ruleStr.split('[');
                    var rule = ruleArr[0];
                    var cons = null;
                    if(ruleArr.length > 1){
                        cons = ruleArr[1].split(']')[0];
                    }
                    if(validator[rule]){
                        if((e.target.value == "" || e.target.value == null) && rule != 'required'){
                            return;
                        }
                    /// lakukan validasi
                        var curStat = validator[rule](e.target.value,cons);
                        if(! curStat && settings.formRules[field].errors && settings.formRules[field].errors[rule]){
                        /// jika terjadi error maka masukan error ke dalam pesan yang akan ditampilkan
                            messages.push(settings.formRules[field].errors[rule]);
                        }
                        stat = stat && curStat;
                    }
                });
            }
        /// ambil elemen container untuk menampilkan pesan error
            var messageElement = elem.siblings(settings.messageSelector);
        /// jika elemen container tidak ditemukan maka mungkin elemen container merupakan siblings dari parent elemen
            if(messageElement.length < 1){
                messageElement = elem.parent().siblings(settings.messageSelector);
            }
            if(! stat){
                if(! settings.showAllMessage){
                /// tampilkan 1 error
                    messageElement.html(messages[messages.length - 1]);
                }else{
                /// tampilkan semua error
                    messageElement.html(messages.join(settings.multiMessageSeparator));
                }
            }else{
            /// jika tidak terjadi error kosongkan pesan error
                messageElement.html('');
            }

        };

    /// error jika applyRules diterapkan di elemen yang bukan form
        if($(this).is('form') === false){
            throw new Error('Hanya dapat digunakan dengan tag form');
        }

        var formItems = this.find('input[name],textarea[name],select[name]').not("[type='submit']");

    /// untuk setiap elemen 'input', 'textarea', dan 'select' lakukan perulangan berikut
        formItems.each(function(){
            var curr = $(this);
        /// membuat atribut 'clean' dari elemen menjadi true
            //curr.attr('clean','true');
            var field = curr.attr('name');
        /// ambil elemen yang menjadi 'label input'
            var labelElem = curr.siblings(settings.labelSelector);
            if(labelElem.length < 1){
                labelElem = curr.parent().siblings(settings.labelSelector);
            }
            if(labelElem === null || labelElem.length < 1) return;
        /// jika 'label input' diakhiri dengan '*' maka hilangkan '*'
            if(! settings.formRules[field]){
                var content = labelElem.html();
                if(content && content[content.length - 1] === '*'){
                    labelElem.html(content.substring(0,content.length - 1));
                }
            }
        /// jika field memiliki rules 'required' maka tambahkan '*' dibelakang 'label input'
            if(settings.formRules[field] && settings.formRules[field].rules.indexOf('required') != -1){
                if(!curr.is(':checkbox')){
                  var content = labelElem.html();
                  if(content[content.length - 1] != '*'){
                      labelElem.html(labelElem.html() + '*');
                  }
                }
            }
        /// jika field memiliki 'externalError' atau error yang berasal dari server-side utamakan 'externalError'
            if(settings.externalErrors[field]){
                var messageElement = curr.siblings(settings.messageSelector);
                if(messageElement.length < 1){
                    messageElement = curr.parent().siblings(settings.messageSelector);
                }
                messageElement.html(settings.externalErrors[field]);
            }

        /// jika elemen mendapat event 'focus' maka element menjadi 'unclean'
            curr.on('focus',unclean);

        /// jika elemen 'select' mendapat event 'change' lakukan validasi
            if(curr.is('select')){
                curr.on('change',checkRules);
                if(settings.forceEvaluateIfNotEmpty){
                    curr.trigger('change');
                }
        /// jika elemen 'input' atau 'textarea' mendapat event 'keyup' lakukan validasi
            }else{
                curr.on('keyup',checkRules);
                if(settings.forceEvaluateIfNotEmpty){
                    curr.trigger('keyup');
                }
            }
        });
    }

})($);
