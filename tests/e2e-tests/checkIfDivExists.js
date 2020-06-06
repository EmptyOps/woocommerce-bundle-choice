describe('getDiv', function() {
	window.location.href="/";
    var d = document.querySelector('DIV');

    it('Should exist', function() {
        expect(d.nodeName).toBe('DIV');
    });
});