<?php
#region usings
namespace de\PersonalLibrary\Enum;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
enum KeywordsSQL: string
{
	case ADD_CONSTRAINT = 'ADD CONSTRAINT';
	case ADD = 'ADD';
	case ALTER_COLUMN = 'ALTER COLUMN';
	case ALTER_TABLE = 'ALTER TABLE';
	case ALTER = 'ALTER';
	case ANY = 'ANY';
	case BACKUP_DATABASE = 'BACKUP DATABASE';
	case BETWEEN = 'BETWEEN';
	case CASE = 'CASE';
	case CHECK = 'CHECK';
	case CREATE_DATABASE = 'CREATE DATABASE';
	case CREATE_INDEX = 'CREATE INDEX';
	case CREATE_OR_REPLACE_VIEW = 'CREATE OR REPLACE VIEW';
	case CREATE_TABLE = 'CREATE TABLE';
	case CREATE_PROCEDURE = 'CREATE PROCEDURE';
	case CREATE_UNIQUE_INDEX = 'CREATE UNIQUE INDEX';
	case CREATE_VIEW = 'CREATE VIEW';
	case CREATE = 'CREATE';
	case DELETE = 'DELETE';
	case DROP_COLUMN = 'DROP COLUMN';
	case COLUMN = 'COLUMN';
	case DROP_CONSTRAINT = 'DROP CONSTRAINT';
	case CONSTRAINT = 'CONSTRAINT';
	case DROP_DATABASE = 'DROP DATABASE';
	case DATABASE = 'DATABASE';
	case DROP_DEFAULT = 'DROP DEFAULT';
	case DEFAULT = 'DEFAULT';
	case DROP_INDEX = 'DROP INDEX';
	case DROP_TABLE = 'DROP TABLE';
	case DROP_VIEW = 'DROP VIEW';
	case DROP = 'DROP';
	case EXEC = 'EXEC';
	case EXISTS = 'EXISTS';
	case FOREIGN_KEY = 'FOREIGN KEY';
	case FROM  = 'FROM';
	case INDEX = 'INDEX';
	case INNER_JOIN = 'INNER JOIN';
	case INSERT_INTO_SELECT = 'INSERT INTO SELECT';
	case INSERT_INTO = 'INSERT INTO';
	case INSERT = 'INSERT';
	case JOIN = 'JOIN';
	case LEFT_INNER_JOIN = 'LEFT INNER JOIN';
	case LEFT_JOIN = 'LEFT JOIN';
	case LEFT_OUTER_JOIN = 'LEFT OUTER JOIN';
	case LIMIT = 'LIMIT';
	case OFFSET = 'OFFSET';
	case ORDER_BY = 'ORDER BY';
	case OUTER_JOIN = 'OUTER JOIN';
	case PRIMARY_KEY = 'PRIMARY KEY';
	case PROCEDURE = 'PROCEDURE';
	case RIGHT_INNER_JOIN = 'RIGHT INNER JOIN';
	case RIGHT_JOIN = 'RIGHT JOIN';
	case RIGHT_OUTER_JOIN = 'RIGHT OUTER JOIN';
	case ROWNUM = 'ROWNUM';
	case SELECT = 'SELECT';
	case SET = 'SET';
	case TRUNCATE_TABLE = 'TRUNCATE TABLE';
	case TABLE = 'TABLE';
	case UNION_ALL = 'UNION ALL';
	case UNION = 'UNION';
	case UNIQUE = 'UNIQUE';
	case UPDATE = 'UPDATE';
	case VALUES = 'VALUES';
	case VIEW = 'VIEW';
	case WHERE = 'WHERE';
}
?>