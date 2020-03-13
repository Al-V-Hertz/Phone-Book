<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contacts.css">
    <title>Contacts</title>
</head>
<body>
    <div class="contacts">
        <div class="heading">
            <span>Contacts</span>
            <input id="suggest" type="text">
            <button id="add">New</button>
        </div>
        <div class="new">
           <form>
                <input id = "name" type="text" placeholder="Name" required>
                <input id = "num" type="tel" pattern="[0-9]{11}" placeholder="Number" required>
                <button id ="submit">Add</button>
           </form>
        </div> 
        <div class="con-list">
            <table>
                <thead>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th></th>
                </thead>
            </table>
        </div>
    </div>
</body>
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
<script src="contacts.js"></script>
</html>