<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">

   <div class="data">
           @foreach($notifications as $key=>$notification)
               <div class="data">
                   <div class="alert alert-primary" role="alert">
                    {{$notification->title}} -- {{$notification->created_at}}
                   </div>
                   @endforeach
               </div>
   </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<script>
    var notificationsWrapper   = $('body');
    var notifications          = notificationsWrapper.find('.data');
    Pusher.logToConsole = false;
    var pusher = new Pusher('a88731cf954258fc4697', {
        cluster: 'eu'
    });
    var channel = pusher.subscribe('notification-send');
    channel.bind('App\\Events\\Notify', function(data) {
        // console.log(data);
        var existingNotifications = notifications.html();
        var newNotificationHtml = `
        <div class="alert alert-primary" role="alert">`+data.message+` -- ` + data.date + `</div>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

    });
</script>
</body>
</html>
