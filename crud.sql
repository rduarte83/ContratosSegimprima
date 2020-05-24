CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `crud` (`id`, `name`, `email`, `phone`, `city`) VALUES
(40, 'divya', 'amohapatra7000@gmail.com', '9114950911', 'balasore'),
(42, 'Divyasundar sahu', 'amohapatra7000@gmail.com', '999999999', 'balasore'),
(43, 'arpita', 'amohapatra7000@gmail.com', '9114950911', 'balasore');

ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;