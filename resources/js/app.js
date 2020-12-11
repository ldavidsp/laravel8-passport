require('./bootstrap');

const channel = pusher.subscribe('projects.created');
channel.bind('created', function(data) {
	alert(JSON.stringify(data.project));
});
