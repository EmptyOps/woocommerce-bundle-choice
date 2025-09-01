jQuery.fn.extend({
    getPath: function () {
        var path, node = this;
        while (node.length) {
            var realNode = node[0], name = realNode.localName;
            if (!name) break;
            name = name.toLowerCase();
​
            var parent = node.parent();
​
            var sameTagSiblings = parent.children(name);
            if (sameTagSiblings.length > 1) { 
                var allSiblings = parent.children();
                var index = allSiblings.index(realNode) + 1;
                if (index > 1) {
                    name += ':nth-child(' + index + ')';
                }
            }
​
            path = name + (path ? '>' + path : '');
            node = parent;
        }
​
        return path;
    }
});
​
jQuery("iframe[title='Site Preview']").contents().find('body *').on('hover',function(){
    jQuery(this).css('border-color','red');
    jQuery(this).css('border-width','5px');
    jQuery(this).css('border-style','solid');
    console.log(jQuery(this).getPath())
})
