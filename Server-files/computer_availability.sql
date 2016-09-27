CREATE DATABASE computer_availability;


CREATE TABLE computer_availability.compstatus (
  computer_name varchar(250) NOT NULL default "",
  status int(11) default NULL,
  computer_type varchar(250) default NULL,
  configuration varchar(250) default NULL,
  floor varchar(250) default NULL,
  left_pos int(11) default NULL,
  top_pos int(11) default NULL,
  updated_at timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (computer_name)
)
