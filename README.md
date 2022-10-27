# PHPSimpleCRUD-FS
Simple PHP CRUD application with data saved in JSON file

## Features

 - Read users JSON file and display data in bootstrap table
 - Implement create and update forms for a user
 - Implement delete user functionality
 - Add image uploading functionality to every user
 - Implement form validation and do not submit form on invalid data

The project was created while recording [youtube video](https://youtu.be/DWHZSkn5paQ)

### MY_NOTES ###

Had trouble uploading picture like he done from 33m onwards. Make sure file path is correct, and forgot I had to upload a jpg photo haha. Had trouble with the tmp name part. I was writing tmp-name and not tmp_name and it was mucking everything up!

For some reason during the create.php process it added in a random id on it's own to the json file and this caused errors on the home page. The tuto guy had the same problem. Watch out.

Deleting with 'GET' request not very secure! Unset() good but users keep their Ids. Array splice does the same but existing (in this case) users' ids are updated, better!

'POST' is better.

Security from 1h09m

