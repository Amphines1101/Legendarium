
CREATE DATABASE IF NOT EXISTS `legendarium` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `legendarium`;



CREATE TABLE `user` (
  `Id_user` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `user` (`Id_user`, `pseudo`, `password`) VALUES
(1, '6bill', '$2y$10$xeL1peOdPmADozeAo98UFu9XjgRTgbDzWkRe2JTDO4VHZApYZU/T6'), -- mdp : admin
(2, 'irobot', '$2y$10$xeL1peOdPmADozeAo98UFu9XjgRTgbDzWkRe2JTDO4VHZApYZU/T6'); -- mdp : admin 



ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`),
  ADD UNIQUE KEY `pseudo_unique` (`pseudo`);



ALTER TABLE `user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

