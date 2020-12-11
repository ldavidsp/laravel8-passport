require('./bootstrap');

const channel = echo.channel('projects.created');
channel.listen('.created', (data) => {
	alert(JSON.stringify(data));
});
