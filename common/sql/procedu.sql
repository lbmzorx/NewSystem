#drop with datatime is int

DROP PROCEDURE IF EXISTS `update_partition_add_last_day`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_partition_add_last_day`(IN databaseName varchar(40),IN tableName varchar(40),IN `date_add` int)
L_END:BEGIN

DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
START TRANSACTION;

SELECT REPLACE(PARTITION_NAME,'p','') INTO @LAST_PARTITION
   FROM INFORMATION_SCHEMA.PARTITIONS
   WHERE ( TABLE_SCHEMA=databaseName ) AND (TABLE_NAME = tableName )
   ORDER BY partition_ordinal_position DESC LIMIT 1;

SELECT @LAST_PARTITION;

SET @NEXT_NAME=DATE_FORMAT(DATE_ADD(@LAST_PARTITION,INTERVAL `date_add` DAY),"%Y_%m_%d");
SELECT @NEXT_NAME;
SET @NEXT_TIMESTAMP=UNIX_TIMESTAMP(@NEXT_NAME);

SELECT @NEXT_TIMESTAMP;

SET @addpartition=CONCAT('ALTER TABLE ',tableName,' ADD PARTITION (PARTITION `p',@NEXT_NAME,'` VALUES LESS THAN ( ',@NEXT_TIMESTAMP,'))');
      /* 输出查看增加分区语句*/
      SELECT @addpartition;
      PREPARE stmt2 FROM @addpartition;
      EXECUTE stmt2;
      DEALLOCATE PREPARE stmt2;
COMMIT ;
end
;;
DELIMITER ;

# drop with datatime is int and sub partition with user_id
#

DROP PROCEDURE IF EXISTS `update_partition_sub_partition_add_last_day`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_partition_sub_partition_add_last_day`(IN databaseName varchar(40),IN tableName varchar(40),IN subcolumn varchar(40),IN hashnum INT,IN `date_add` int)
    L_END:BEGIN

    DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
    START TRANSACTION;

    SELECT REPLACE(PARTITION_NAME,'p','') INTO @LAST_PARTITION
    FROM INFORMATION_SCHEMA.PARTITIONS
    WHERE ( TABLE_SCHEMA=databaseName ) AND (TABLE_NAME = tableName )
    ORDER BY partition_ordinal_position DESC LIMIT 1;

    IF @LAST_PARTITION IS NULL THEN
      SET @LAST_PARTITION=UNIX_TIMESTAMP(date_add(curdate(), interval - day(curdate()) + 1 day));
    END IF ;
    SELECT @LAST_PARTITION;

    SET @NEXT_NAME=DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(@LAST_PARTITION,"%Y_%m_%d"),INTERVAL `date_add` DAY),"%Y_%m_%d");
    SELECT @NEXT_NAME;
    SET @NEXT_TIMESTAMP=UNIX_TIMESTAMP(@NEXT_NAME);

    SELECT @NEXT_TIMESTAMP;

    SET @addpartition=CONCAT('ALTER TABLE ',tableName,' ADD PARTITION  SUBPARTITION  BY HASH(',subcolumn,') SUBPARTITIONS ',hashnum,' (PARTITION `p',@NEXT_NAME,'` VALUES LESS THAN ( ',@NEXT_TIMESTAMP,'))');
    /* 输出查看增加分区语句*/
    SELECT @addpartition;
    PREPARE stmt2 FROM @addpartition;
    EXECUTE stmt2;
    DEALLOCATE PREPARE stmt2;
    COMMIT ;
  end
;;
DELIMITER ;