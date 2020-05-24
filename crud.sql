CREATE TABLE `crud` (
  `id` SERIAL PRIMARY KEY,
  `cliente` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `modulos` varchar(255) NOT NULL
);

INSERT INTO `crud` VALUES
	('JoanaA', '20', '01-01-2021', '2'),
	('Ze', '50', '01-02-2030', '3'),
	('Xico', '40', '01-05-2025', '5'),
	('Antonio', '25', '02-05-1980', '2');