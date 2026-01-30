window.document.splugins = window.document.splugins || {};

window.document.splugins.events = window.document.events || {

	publish:jQuery.fn.on,
	unpublish:jQuery.fn.off,
	trigger:jQuery.fn.trigger

};
