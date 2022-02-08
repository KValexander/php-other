SELECT * FROM `table`;
SELECT * FROM `table` WHERE `id`=1;
SELECT * FROM `table` WHERE `field_1`='n' AND `field_2`='n' OR `field_3`='n';

SELECT `field_1`, `field_2`, `field_3` as `f3` FROM `table` WHERE `id`=1 ORDER BY `id` DESC LIMIT 4;

INSERT INTO `table` VALUES(NULL, 'i', 'i', 'i');
INSERT INTO `table`(`field_1`, `field_2`, `field_3`) VALUES('i', 'i', 'i');
INSERT INTO `table`(`field_1`, `field_2`, `field_3`) VALUES
	('i', 'i', 'i'),
	('i', 'i', 'i'),
	('i', 'i', 'i'),
	('i', 'i', 'i');

UPDATE `table` SET `field_1`='u' WHERE `id`=1;
UPDATE `table` SET `field_1`='u', `field_2`='u', `field_3`='u' WHERE `id`=1;

DELETE FROM `table`;
DELETE FROM `table` WHERE `id`=1;