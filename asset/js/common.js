/**
 * common js functions and also the common defs for the module, observer, prototype and singleton design patterns 
 */
window.document.splugins = window.document.splugins || {};
window.document.splugins.common = window.document.splugins.common || {};


//  TODO publish defs from here of the any design pattern that we define to be used as common patter like design pattern of the wbc.filters module 
    //  below the observer design pattern implemented for Feed.events act as one of published defs



//  Feed 
window.document.splugins.Feed = window.document.splugins.Feed || {};



//  Feed.events 
//  the feeling comes in the mind is it may become overloaded if we create such a broad class like Feed where Feed page can contain many features, events and so on. but there is absolute need of one central observer pattern which let subscribe to any subject(feature) and then later notify them when related event occurs. the need is of central observer and notifier but nothing beyond that so it will be very light and almost like a namespace holding diferent fetures. and in essense Feed will be collection of different subject(feature) where each subject is itself a observer pattern. 
    //  it is supposed to hold the collection of features like pagination, filters, feed render, sorting and so on but yeah its only job is to listen to events and notify to their subscribers. 
window.document.splugins.Feed.events = window.document.splugins.Feed.events || {};

window.document.splugins.Feed.events.subject = function( feature_unique_key, notifications ) {
    this.feature_unique_key = feature_unique_key;
    this.notifications = notifications;     // [];    //  list of notifications it can notify for.  
    this.observers = [];

    return {
    feature_unique_key: function() {

        return this.feature_unique_key;
    },    
    subscribeObserver: function(observer) {
        // ACTIVE_TODO here check the callbacks of observer first and if this subject is not supporting the notifications for particular callback then simply throw error and do not subscriber the observer 

        this.observers.push(observer);
    },
    unsubscribeObserver: function(observer) {
        // ACTIVE_TODO implement as required only
        // var index = this.observers.indexOf(observer);
        // if(index > -1) {
        // this.observers.splice(index, 1);
        // }
    },
    notifyObserver: function(observer) {
        // ACTIVE_TODO implement as required only
        // var index = this.observers.indexOf(observer);
        // if(index > -1) {
        // this.observers[index].notify(index);
        // }
    },
    notifyAllObservers: function(notification) {
        for(var i = 0; i < this.observers.length; i++){
            this.observers[i].notify(i, notification);
        };
    }
    };
};

window.document.splugins.Feed.events.observer = function(callbacks) {
    this.callbacks = callbacks;     // [];    //  list of notifications callbacks it waits for.  

    return {
        notify: function(index, notification) {
            // console.log("Observer " + index + " is notified!");

            // TODO check if observer listens to this notification and if not then return with false
            // var index = this.observers.indexOf(observer);
            // if(index > -1) {
            // this.observers.splice(index, 1);
            // }

            this.callbacks[notification]();
        }
    }
}

window.document.splugins.Feed.events.core = function() {
    this.subjects = [];

    return {

        createSubject: function( feature_unique_key, notifications ) {
            // console.log("Observer " + index + " is notified!");

            // TODO check if subject already created and exist then throw error
            // var index = this.observers.indexOf(observer);
            // if(index > -1) {
            // this.observers.splice(index, 1);
            // }

            this.subjects.push( new window.document.splugins.Feed.events.subject( feature_unique_key, notifications ) );
        }, 
        subscribeObserver: function(feature_unique_key, callbacks) {
            // console.log("Observer " + index + " is notified!");

            // before subscribing the ovserver check if the feature_unique_key subject is created in the first place, if not then throw error 
            var found_index = null;
            for(var i = 0; i < this.subjects.length; i++){
                if( this.subjects[i].feature_unique_key() == feature_unique_key ) {

                    found_index = i;
                    break;
                }
            }

            if( found_index == -1 ) {

                throw "There is no subject exist for specified feature_unique_key "+feature_unique_key;
            } else {

                this.subjects[found_index].subscribeObserver( new window.document.splugins.Feed.events.observer( callbacks ) );
            }
        },
        notifyAllObservers: function(feature_unique_key, notification) {
            // console.log("Observer " + index + " is notified!");

            // check if the feature_unique_key subject is created in the first place, if not then throw error 
            var found_index = null;
            for(var i = 0; i < this.subjects.length; i++){
                if( this.subjects[i].feature_unique_key() == feature_unique_key ) {

                    found_index = i;
                    break;
                }
            }

            if( found_index == -1 ) {

                throw "There is no subject exist for specified feature_unique_key "+feature_unique_key;
            } else {

                this.subjects[found_index].notifyAllObservers( notification );
            }
        }

    }
}

// var subject = new Subject();

// var observer1 = new Observer();
// var observer2 = new Observer();
// var observer3 = new Observer();
// var observer4 = new Observer();

// subject.subscribeObserver(observer1);
// subject.subscribeObserver(observer2);
// subject.subscribeObserver(observer3);
// subject.subscribeObserver(observer4);

// subject.notifyObserver(observer2); // Observer 2 is notified!

// subject.notifyAllObservers();
// // Observer 1 is notified!
// // Observer 2 is notified!
// // Observer 3 is notified!
// // Observer 4 is notified!
