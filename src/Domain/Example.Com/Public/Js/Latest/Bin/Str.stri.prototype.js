_('prototype').stristr = function (haystack, needle, bool){
    var pos = 0;
    haystack += '';
    pos = haystack.toLowerCase().indexOf((needle + '').toLowerCase());
    if (pos === -1) {
        return false;
    } else {
        if (bool) {
            return haystack.substring(0, pos);
        } else {
            return haystack.slice(pos);
        }
    }
}

priya.stristr = _('prototype').stristr;