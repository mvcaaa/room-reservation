<?php

use yii\db\Migration;

class m170206_185505_initial extends Migration
{
    public function up()
    {
        $this->execute(
          "
        CREATE TABLE IF NOT EXISTS `room` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `title` VARCHAR(250) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

        DROP TABLE IF EXISTS `reservation`;
        CREATE TABLE IF NOT EXISTS `reservation` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `client_name` VARCHAR(250) NOT NULL,
        `room_id` INT(11) NOT NULL,
        `date` DATETIME DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `reservation_room` (`room_id`),
        CONSTRAINT `reservation_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
        ");
    }

    public function down()
    {
        echo "m170206_185505_initial cannot be reverted.\n";
        $this->execute("DROP TABLE IF EXISTS `room`;");
        $this->execute("DROP TABLE IF EXISTS `reservation`;");
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
