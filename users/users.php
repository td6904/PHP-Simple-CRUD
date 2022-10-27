<?php

function getUsers()
{
return json_decode(file_get_contents(filename:__DIR__.'/users.json'), true);
//                                  States that it's an array   ---> ^^ Never seemed to work when I tried to tag ASSOC array 3m48!

}

function getUserById($id)
{
     $users = getUsers();
     foreach ($users as $user) {
        if ($user['id'] == $id){
        return $user;
     }
}
//vvvv this means that if there's no matching ID then it returns null. So I put Id two and it didn't work
//As I don't have one. The numbers start from 6 so null then.
return null;
}

//^^^ This function in general. Bloody complex logic, why I'm getting stuck on more complicated stuff maybe. Defo revisit this.

function createUser($data)
{
      $users = getUsers();

      $data['id'] = rand(1000000, 2000000);

      $users[] = $data;

      putJson($users);

      return $data;
}

function updateUser($data, $id)
{
   $updateUser = [];
   $users = getUsers();
   foreach ($users as $i => $user){
      if ($user['id'] == $id){
         $users[$i] = $updateUser = array_merge($user, $data);
         //                    ^^^Quite confusing but do with if the name appears in the name and the data I think
      }  
   }

      putJson($users);

      return $updateUser;

}

function deleteUser($id)
{
   $users = getUsers();

   foreach ($users as $i => $user){
      if ($user['id'] == $id) {
         array_splice($users, $i, length: 1);
      }
   }
   putJson($users);
}


//Once function was moved here, not really sure why we changed $userId to $user['id']
function uploadImage($file, $user){
   
   if (isset($_FILES['picture']) && $_FILES['picture']['name']){

   
   if(!is_dir(filename:__DIR__.'/images')) {
      mkdir(pathname:__DIR__."/images");
  }
  //Get the file extension from the filename
  $filename = $file['name'];
  //Search for the dot in the filename
  $dotPosition = strpos($filename, needle: '.');
  //Take the substring from the dot position 'till the end
  $extension = substr($filename, $dotPosition + 1);
  move_uploaded_file($file['tmp_name'], __DIR__."/images/${user['id']}.$extension");
      //^^^ Really cool this
  $user['extension'] = $extension;
  updateUser($user, $user['id']);
}
}
//                                                 ^^^^^Have to make new folder for imported img

//     vvv v v v v This will update the pages with our new info!

/////////////Not this, above note was for something else//////////////////////////

function putJson($users) 
{
   file_put_contents(__DIR__.'/users.json', json_encode($users, JSON_PRETTY_PRINT));
   //^^This function makes my inputted data in update.php get to users.json, but to get it to refresh/update on page we're
//on we have to do other stuff.
}
