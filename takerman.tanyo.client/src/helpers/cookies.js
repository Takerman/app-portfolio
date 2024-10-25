export default {
    get: function (id) {
        let value = document.cookie.match('(^|;)?' + id + '=([^;]*)(;|$)');
        return value ? unescape(value[2]) : null;
    },
    delete: function (id) {
        document.cookie = id + '=;';
    },
    set: function (id, value) {
        document.cookie = id + '=' + value;
    }
};