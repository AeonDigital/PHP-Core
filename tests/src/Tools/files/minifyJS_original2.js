/**
* @package Code Craft
* @pdesc Conjunto de soluções front-end.
*
* @module BasicTools
* @file Traz métodos úteis para construção de outras classes.
*
* @author Rianna Cantarelli <rianna.aeon@gmail.com>
*/
'use strict';






// --------------------
// Caso não exista, inicia objeto CodeCraft
var CodeCraft = (CodeCraft || function () { });
if(typeof(CodeCraft) === 'function') { CodeCraft = new CodeCraft(); };






/**
* Métodos versáteis para inúmeras aplicações.
*
* @class BasicTools
*
* @memberof CodeCraft
*
* @static
*
* @type {Class}
*/
CodeCraft.BasicTools = new (function () {



    /**
    * OBJETO PÚBLICO QUE SERÁ EXPOSTO.
    */
    var p = this.Control = {





        // -------------------------------------
        // VERIFICAÇÃO DE TIPOS



        /**
        * Retorna o Tipo do Objeto informado.
        * 
        * @function TypeOf
        *
        * @memberof BasicTools
        *
        * @param {Object}           o           Objeto.
        *
        * @return {String}
        */
        TypeOf: function (o) {
            return Object.prototype.toString.call(o);
        },




        /**
        * Verifica se o valor informado é qualquer um diferente de undefined, null ou '' .
        * 
        * @function IsNotNullValue
        *
        * @memberof BasicTools
        *
        * @param {Object}           o           Objeto.
        *
        * @return {Boolean}
        */
        IsNotNullValue: function (o) {
            return (o !== undefined && o !== null && o !== '') ? true : false;
        },




        /**
        * Verifica se a variável passada é do tipo 'object'.
        * 
        * @function IsObject
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsObject: function (v) {
            return (typeof (v) === 'object') ? true : false;
        },




        /**
        * Verifica se a variável passada é do tipo 'boolean'.
        * 
        * @function IsBoolean
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsBoolean: function (v) {
            return (typeof (v) === 'boolean') ? true : false;
        },



        /**
        * Verifica se a variável passada é do tipo 'number'.
        * 
        * @function IsNumber
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsNumber: function (v) {
            return (typeof (v) === 'number') ? true : false;
        },




        /**
        * Verifica se a variável passada é do tipo 'number' e se o valor é inteiro.
        * 
        * @function IsInteger
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsInteger: function (v) {
            return (typeof (v) === 'number' && (v % 1 === 0)) ? true : false;
        },




        /**
        * Verifica se a variável passada é do tipo 'string'.
        * 
        * @function IsString
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsString: function (v) {
            return (typeof (v) === 'string') ? true : false;
        },




        /**
        * Verifica se a variável passada é do tipo 'Date'.
        * 
        * @function IsDate
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsDate: function (v) {
            return (p.TypeOf(v) === '[object Date]') ? true : false;
        },




        /**
        * Verifica se a variável passada é do tipo 'Array'.
        * 
        * @function IsArray
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsArray: function (v) {
            return (p.TypeOf(v) === '[object Array]') ? true : false;
        },




        /**
        * Verifica se a variável passada é um objeto JSON.
        * 
        * @function IsJSON
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsJSON: function (v) {
            return (p.TypeOf(v) === '[object Object]') ? true : false;
        },




        /**
        * Verifica se a variável passada é do tipo 'function'.
        * 
        * @function IsFunction
        *
        * @memberof BasicTools
        *
        * @param {Object}           v           Valor que será testado.
        *
        * @return {Boolean}
        */
        IsFunction: function (v) {
            return (typeof (v) === 'function') ? true : false;
        },










        // --------------------------------------
        // FORMATAÇÃO DE STRINGS



        /**
        * Remove espaços em branco no inicio e no final da string.
        * 
        * @function Trim
        *
        * @memberof BasicTools
        *
        * @param {String}           s           String que será ajustada.
        *
        * @return {String}
        */
        Trim: function (s) {
            return s.toString().replace(/^\s+|\s+$/g, '');
        },




        /**
        * Substitui toda ocorrência de determinada string por uma outra definida.
        * 
        * @function ReplaceAll
        *
        * @memberof BasicTools
        *
        * @param {String}           s           String que será ajustada.
        * @param {String}           o           String que será substituída.
        * @param {String}           n           String que será adicionada no lugar de "o".
        *
        * @return {String}
        */
        ReplaceAll: function (s, o, n) {
            var sR = s;
            while (sR.indexOf(o) != -1) { sR = sR.replace(o, n); }
            return sR;
        },




        /**
        * Remove da string todas as ocorrências da cadeia de caracteres informado.
        * 
        * @function RemoveChars
        *
        * @memberof BasicTools
        *
        * @param {String}           s           String que será ajustada.
        * @param {String}           r           Caracteres que deverão ser excluidos do texto original.
        *
        * @return {String}
        */
        RemoveChars: function (s, r) {
            var sR = s;

            for (var i = 0; i < r.length; i++) {
                sR = p.ReplaceAll(sR, r.charAt(i), '');
            }

            return sR;
        },




        /**
        * Retorna o valor da querystring indicada.
        * 
        * @function GetQueryString
        *
        * @memberof BasicTools
        *
        * @param {String}           k           QueryString a ser procurada.
        * @param {String}           [url]       Url na qual a pesquisa será feita, caso não seja informada pesquisa na URL atual.
        *
        * @return {!String}
        */
        GetQueryString: function (k, url) {
            url = (url === undefined) ? window.location.href : url;

            var reg = new RegExp('[?&]' + k + '=([^&#]*)', 'i');
            var v = reg.exec(url);

            return ((v) ? decodeURI(v[1]) : null);
        },




















        // -------------------------------------
        // CONVERSÃO DE TIPOS



        /**
        * Coleção de métodos para conversão de tipos.
        *
        * @memberof BasicTools
        *
        */
        TryParse: {
            /**
            * Converte o tipo do valor passado para 'boolean'.
            * 
            * @function ToBoolean
            *
            * @memberof TryParse
            *
            * @param {Object}           o           Objeto que será convertido.
            *
            * @example Exemplos de conversão
            * True = true; yes; 1; on; checked; disabled; multiple; readonly; required.
            * False = false; no; 0; off, undefined, null, ''
            * 
            *
            * @return {Boolean}
            */
            ToBoolean: function (o) {
                var r = null;

                switch (typeof (o)) {
                    case 'boolean':
                        r = o;

                        break;

                    case 'number':
                        if (o === 0 || o === 1) { r = (o === 0) ? false : true; }
                        else { r = false; }

                        break;

                    case 'string':
                        switch (o.toLowerCase()) {
                            case 'true': case 'yes': case '1': case 'on':
                            case 'checked': case 'disabled': case 'multiple':
                            case 'readonly': case 'required':
                                r = true;

                                break;

                            case 'false': case 'no': case '0': case 'off':
                                r = false;

                                break;

                            default:
                                r = false;

                                break;
                        }

                        break;

                    default:
                        r = (p.IsNotNullValue(o)) ? true : false;

                        break;
                }

                return r;
            },





            /**
            * Converte o tipo do valor passado para 'number'.
            * Caso não seja um tipo possível de ser convertido, retorna o próprio objeto.
            * 
            * @function ToNumber
            *
            * @memberof TryParse
            *
            * @param {Object}           o           Objeto que será convertido.
            *
            * @return {Number|Object}
            */
            ToNumber: function (o) {
                if (p.IsNumber(o)) { return o; }
                else {
                    if (p.IsBoolean(o)) {
                        return (o) ? 1 : 0;
                    }
                    else if (p.IsString(o) && o !== '' && !isNaN(o)) {
                        return parseFloat(o);
                    }

                    return o;
                }
            },





            /**
            * Converte o tipo do valor passado para um 'number integer'.
            * Caso não seja um tipo possível de ser convertido, retorna o próprio objeto.
            * Números com ponto flutuante serão arredondados pela função "parseInt".
            * 
            * @function ToInteger
            *
            * @memberof TryParse
            *
            * @param {Object}           o           Objeto que será convertido.
            *
            * @return {Integer|Object}
            */
            ToInteger: function (o) {
                if (p.IsNumber(o)) { return parseInt(o, 10); }
                else {
                    if (p.IsBoolean(o)) {
                        return (o) ? 1 : 0;
                    }
                    else if (p.IsString(o) && o !== '' && !isNaN(o)) {
                        return parseInt(o, 10);
                    }

                    return o;
                }
            },





            /**
            * Converte o tipo do valor passado para um 'float number'.
            * Caso não seja um tipo possível de ser convertido, retorna o próprio objeto.
            * 
            * @function ToFloat
            *
            * @memberof TryParse
            *
            * @param {Object}           o           Objeto que será convertido.
            *
            * @return {Float|Object}
            */
            ToFloat: function (o) {
                o = p.TryParse.ToNumber(o);

                if (p.IsNumber(o)) {
                    return parseFloat(o);
                }
                return o;
            },





            /**
            * Converte o tipo do valor passado para um objeto 'date'.
            * 
            * @function ToDate
            *
            * @memberof TryParse
            *
            * @param {Object}           o                                   Objeto que será convertido.
            * @param {String}           [mk = yyyy-MM-dd HH:mm:ss]          Máscara da data para conversão.
            *
            * @return {Date|Object}
            */
            ToDate: function (o, mk) {
                if (p.IsNumber(o)) {
                    return new Date(o);
                }
                else if (p.IsString(o) && o !== '') {
                    mk = (mk === undefined) ? 'yyyy-MM-dd HH:mm:ss' : mk;

                    var sO = o;
                    var oR = null;

                    var Clean = function (f) {
                        f = f.replace('t', ' ').replace('T', ' ');
                        return p.RemoveChars(f, '-/.:wWzZ');
                    };

                    sO = Clean(sO);
                    mk = Clean(mk);


                    if (sO.length == mk.length) {
                        var y = '';
                        var M = '';
                        var d = '';
                        var H = '';
                        var m = '';
                        var s = '';

                        for (var i = 0; i < mk.length; i++) {
                            var n = sO.charAt(i);
                            var part = mk.charAt(i);

                            switch (part) {
                                case 'y': y += n; break;
                                case 'M': M += n; break;
                                case 'd': d += n; break;
                                case 'H': H += n; break;
                                case 'm': m += n; break;
                                case 's': s += n; break;
                            }
                        }

                        var out = false;

                        // Testa limites para ano
                        (y == '') ? y = '0001' : ((y < 1 || y > 9999) ? out = true : '');

                        // Testa limites para mês
                        (M == '') ? M = '01' : ((M < 1 || M > 12) ? out = true : '');

                        // Testa limites para dia
                        (d == '') ? d = '01' : ((d < 1 || d > 31) ? out = true : '');

                        // Testa limites para hora
                        (H == '') ? H = '00' : ((H < 0 || H > 23) ? out = true : '');

                        // Testa limites para minuto
                        (m == '') ? m = '00' : ((m < 0 || m > 59) ? out = true : '');

                        // Testa limites para segundo
                        (s == '') ? s = '00' : ((s < 0 || s > 59) ? out = true : '');

                        if (!out) {
                            oR = Date.parse(y + '-' + M + '-' + d + 'T' + H + ':' + m + ':' + s);
                            oR = (isNaN(oR)) ? null : new Date(oR);

                            return oR;
                        }
                    }
                }

                return o;
            }


        },




















        // -------------------------------------
        // MANIPULAÇÃO DE OBJETOS



        /**
        * Caso o objeto a ser testado não tenha sido iniciado, retorna o valor padrão.
        * Considera inicialmente que qualquer objeto com os valores undefined, null ou '' não estão iniciados.
        * 
        * @function InitiSet
        *
        * @memberof BasicTools
        *
        * @param {Object}           o                   Objeto a ser testado.
        * @param {Object}           [d = null]          Valor padrão a ser retornado.
        * @param {Boolean}          [u = false]         Se "true", passa a considerar não iniciados apenas valores undefined.
        *
        * @return {?Object}
        */
        InitiSet: function (o, d, u) {
            d = (d === undefined) ? null : d;
            u = (u === undefined) ? false : u;

            if (u) {
                return (o === undefined) ? d : o;
            }
            else {
                return (p.IsNotNullValue(o)) ? o : d;
            }
        },




        /**
        * Permite ordenar um array de objetos a partir da indicação de uma de suas propriedades.
        * O uso deste método se dá no escopo da ordenação de um array.
        * 
        * @function DynamicSort
        *
        * @memberof BasicTools
        *
        * @param {String}           pn                  Nome da propriedade que será usada como indice.
        * @param {String}           so                  Forma da ordenação [asc | desc].
        * @param {String}           tp                  Tipo do dado [Integer | Float | Date | String].
        *
        * @example 
        * var arr = [{...}, {...}, {...}];
        * arr.sort(DynamicSort('PropName', 'Asc'));
        *
        * @return {Function}
        */
        DynamicSort: function (pn, so, tp) {
            var asc = (so === 'asc');

            var _sort = function (a, b) {
                var r = null;
                var aV = a[pn];
                var bV = b[pn];

                switch (tp) {
                    case 'Integer':
                    case 'Float':
                    case 'Date':
                        if (aV == null) {
                            if (tp == 'Date') { aV = new Date(-8640000000000000); }
                            else { aV = Number.MIN_VALUE; }
                        }
                        if (bV == null) {
                            if (tp == 'Date') { bV = new Date(-8640000000000000); }
                            else { bV = Number.MIN_VALUE; }
                        }


                        if (asc) { r = aV - bV; }
                        else { r = bV - aV; }

                        break;

                    case 'String':
                        aV = (aV == null) ? '' : aV.toLowerCase();
                        bV = (bV == null) ? '' : bV.toLowerCase();

                        var r = (aV < bV) ? -1 : (aV > bV) ? 1 : 0;

                        r = (asc) ? r : r * -1;
                        break;
                }

                return r;
            };

            return _sort;
        },




        /**
        * Clona um objeto completamente.
        * 
        * @function CloneObject
        *
        * @memberof BasicTools
        *
        * @param {Object}           o           Objeto.
        *
        * @return {Object}
        */
        CloneObject: function (o) {

            if (o === null || o === undefined) { return o; }
            else if (p.IsObject(o)) {

                if (p.IsDate(o)) {
                    return new Date(o.getTime());
                }
                else if (p.IsArray(o)) {
                    var c = [];
                    for (var i in o) { c[i] = p.CloneObject(o[i]); }
                    return c;
                }
                else {
                    var c = {};

                    for (var i in o) {
                        if (p.IsObject(o[i])) { c[i] = p.CloneObject(o[i]); }
                        else { c[i] = o[i]; }
                    }

                    return c;
                }
            }
            else {
                return o;
            }
        },




        /**
        * Identifica o tipo de campo do elemento passado
        * 
        * @function GetFieldType
        *
        * @memberof BasicTools
        *
        * @param {Node}             f           Node de um campo de formulário.
        *
        * @return {Object}
        */
        GetFieldType: function (f) {
            var r = {
                IsField: false,
                IsTextArea: false,
                IsSelect: false,
                IsRadio: false,
                IsCheckBox: false
            };


            var t = f.tagName.toLowerCase();

            switch (t) {
                case 'input':
                    var tp = f.getAttribute('type').toLowerCase();
                    if (tp == 'radio') { r.IsRadio = true; }
                    else if (tp == 'checkbox') { r.IsCheckBox = true; }
                    else { r.IsField = true; }

                    break;

                case 'textarea':
                    r.IsTextArea = true;
                    break;

                case 'select':
                    r.IsSelect = true;
                    break;
            }

            return r;
        },




        /**
        * Retorna um novo array apenas com valores únicos do array passado.
        * 
        * @function GetUniqueValues
        *
        * @memberof BasicTools
        *
        * @param {Node}             arr         Array que será processado.
        *
        * @return {Array}
        */
        GetUniqueValues: function (arr) {
            var nA = [];

            for (var it in arr) {
                if (nA.indexOf(arr[it]) === -1) {
                    nA.push(arr[it]);
                }
            }

            return nA;
        }
    };





    return p;
});