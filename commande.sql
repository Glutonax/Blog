create database blog;
use blog;
create table article (
    id int not null auto_increment primary key,
    nom varchar(255),
    contenu text,
    createDate timestamp
);

INSERT INTO article values (null, "premier article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, eum consequatur. Saepe suscipit id quas? Harum velit quibusdam quo aspernatur. Dignissimos deleniti animi voluptates quibusdam fugit officia mollitia, velit vero.",CURRENT_TIMESTAMP)
,(null, "deuxieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, eum consequatur. Saepe suscipit id quas? Harum velit quibusdam quo aspernatur. Dignissimos deleniti animi voluptates quibusdam fugit officia mollitia, velit vero.",CURRENT_TIMESTAMP)
,(null, "troisieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, eum consequatur. Saepe suscipit id quas? Harum velit quibusdam quo aspernatur. Dignissimos deleniti animi voluptates quibusdam fugit officia mollitia, velit vero.",CURRENT_TIMESTAMP)
,(null, "quatrieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, eum consequatur. Saepe suscipit id quas? Harum velit quibusdam quo aspernatur. Dignissimos deleniti animi voluptates quibusdam fugit officia mollitia, velit vero.",CURRENT_TIMESTAMP)
,(null, "cinquieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, eum consequatur. Saepe suscipit id quas? Harum velit quibusdam quo aspernatur. Dignissimos deleniti animi voluptates quibusdam fugit officia mollitia, velit vero.",CURRENT_TIMESTAMP);