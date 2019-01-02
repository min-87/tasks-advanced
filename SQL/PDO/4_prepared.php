<?php

/*


UserMapper это класс отвечающий за сохранение объектов класса User в базе вместе с зависимостями. В нашем примере User может содержать фотографии (класс Photo).

Структура таблиц описана в файле UserMapperTest.php.

Пример:

$user = new User();
$user->addPhoto('family', '/path/to/photo/family');
$user->addPhoto('party', '/path/to/photo/party');
$user->addPhoto('friends', '/path/to/photo/friends');

$mapper = new UserMapper($pdo);
$mapper->save($user);

file: UserMapper.php

Реализуйте функцию save в классе UserMapper. В этом задании достаточно реализовать логику сохранения (только вставку) фотографий пользователя.

*/
namespace App;

class UserMapper
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function save(User $user)
    {
        $stmtUser = $this->pdo->prepare("INSERT INTO users (name) VALUES (?)");
        $stmtUser->execute([$user->getName()]);
        $user->setId($this->pdo->lastInsertId());

        // BEGIN (write your solution here)
        $stmtPhoto = $this->pdo->prepare("INSERT INTO user_photos
         (user_id, name,filepath) VALUES (:user_id, :name, :filepath)");
         $photos=$user->getPhotos();
         foreach ($photos as $photo){
         $stmtPhoto->bindValue(':user_id', $user->getId());
         $stmtPhoto->bindValue(':name', $photo->getName());
         $stmtPhoto->bindValue(':filepath', $photo->getFilepath());
         $stmtPhoto->execute();
         };
        // END
    }
}

