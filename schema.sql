drop database if exists `custom_form`;

create database `custom_form`;

use `custom_form`;

create table if not exists `user` (
    `id` int(10) not null auto_increment,
    `fullname` varchar(300) not null,
    `email` varchar(100) null,
    `username` varchar(100) not null,
    `password` varchar(255) not null,
    `created_at` datetime not null,
    `updated_at` datetime not null,
    primary key (`id`)
);

create table if not exists `form` (
    `id` int(10) not null auto_increment,
    `created_by` int(10) not null,
    `slug` varchar(8) not null,
    `form_title` varchar(100) not null,
    `last_name` tinyint(1) null default 0,
    `first_name` tinyint(1) null default 0,
    `middle_name` tinyint(1) null default 0,
    `gender` tinyint(1) null default 0,
    `dob` tinyint(1) null default 0,
    `address` tinyint(1) null default 0,
    `likes_dislikes` tinyint(1) null default 0,
    `created_at` datetime not null,
    `updated_at` datetime not null,
    primary key (`id`),
    foreign key (`created_by`) references user(`id`)
);

create table if not exists `participants` (
    `id` int(10) not null auto_increment,
    `form_id` int(10) not null,
    `last_name` varchar(100) null,
    `first_name` varchar(100) null,
    `middle_name` varchar(100) null,
    `date_of_birth` date null,
    `address` varchar(100) null,
    `gender` varchar(10) null,
    `likes` varchar(500) null,
    `dislikes` varchar(500) null,
    `created_at` datetime not null,
    `updated_at` datetime not null,
    primary key (`id`),
    foreign key (`form_id`) references form(`id`)
);

insert into user (`id`, `fullname`, `email`, `username`, `password`, `created_at`, `updated_at`) values
(1, 'Khaleb Great', 'developer@khaleb.dev', 'developer', '$2y$10$nNSlA.PMMaxvMKWpCtFXf.O71O5vF9C5vhn.gFiq..seTO85vhEmy', NOW(), NOW());
(2, 'Miracle Daniel', 'bestie@khaleb.dev', 'miradani', '$2y$10$nNSlA.PMMaxvMKWpCtFXf.O71O5vF9C5vhn.gFiq..seTO85vhEmy', NOW(), NOW());
(3, 'Judith Chiamaka', 'dearest@khaleb.dev', 'judith', '$2y$10$nNSlA.PMMaxvMKWpCtFXf.O71O5vF9C5vhn.gFiq..seTO85vhEmy', NOW(), NOW());
-- password = 123456

COMMIT;