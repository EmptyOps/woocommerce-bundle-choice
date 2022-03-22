/**
 * common js functions and also the common defs for the module, observer, prototype and singleton design patterns 
 */
window.document.splugins = window.document.splugins || {};
window.document.splugins.common = window.document.splugins.common || {};


//	TODO publish defs from here of the any design pattern that we define to be used as common patter like design pattern of the wbc.filters module 
	//	below the observer design pattern implemented for Feed.events act as one of published defs



//	Feed 
window.document.splugins.Feed = window.document.splugins.Feed || {};



//	Feed.events 
//	the feeling comes in the mind is it may become overloaded if we create such a broad class like Feed where Feed page can contain many features, events and so on. but there is absolute need of one central observer pattern which let subscribe to any subject(feature) and then later notify them when related event occurs. the need is of central observer and notifier but nothing beyond that so it will be very light and almost like a namespace holding diferent fetures. and in essense Feed will be collection of different subject(feature) where each subject is itself a observer pattern. 
	//	it is supposed to hold the collection of features like pagination, filters, feed render, sorting and so on but yeah its only job is to listen to events and notify to their subscribers. 
window.document.splugins.Feed.events = window.document.splugins.Feed.events || {};

window.document.splugins.Feed.events.subject = function() {
    this.feature_unique_key = null;
    this.observers = [];

    return {
    subscribeObserver: function(observer) {
        this.observers.push(observer);
    },
    unsubscribeObserver: function(observer) {
        var index = this.observers.indexOf(observer);
        if(index > -1) {
        this.observers.splice(index, 1);
        }
    },
    notifyObserver: function(observer) {
        var index = this.observers.indexOf(observer);
        if(index > -1) {
        this.observers[index].notify(index);
        }
    },
    notifyAllObservers: function() {
        for(var i = 0; i < this.observers.length; i++){
        this.observers[i].notify(i);
        };
    }
    };
};

window.document.splugins.Feed.events.observer = function() {
    return {
    notify: function(index) {
        console.log("Observer " + index + " is notified!");
    }
    }
}

window.document.splugins.Feed.events.subjects = [];

window.document.splugins.Feed.events.create = function() {
    return {

	    subject: function( feature_unique_key ) {
	        console.log("Observer " + index + " is notified!");
	    }, 
	    observer: function() {
	        console.log("Observer " + index + " is notified!");
	    }

    }
}

var subject = new Subject();

var observer1 = new Observer();
var observer2 = new Observer();
var observer3 = new Observer();
var observer4 = new Observer();

subject.subscribeObserver(observer1);
subject.subscribeObserver(observer2);
subject.subscribeObserver(observer3);
subject.subscribeObserver(observer4);

subject.notifyObserver(observer2); // Observer 2 is notified!

subject.notifyAllObservers();
// Observer 1 is notified!
// Observer 2 is notified!
// Observer 3 is notified!
// Observer 4 is notified!
