create or replace table cache
(
    `key`      varchar(255) not null
        primary key,
    value      mediumtext   not null,
    expiration int          not null
)
    collate = utf8mb4_unicode_ci;

create or replace table cache_locks
(
    `key`      varchar(255) not null
        primary key,
    owner      varchar(255) not null,
    expiration int          not null
)
    collate = utf8mb4_unicode_ci;

create or replace table cities
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create or replace table contact
(
    id           bigint unsigned auto_increment
        primary key,
    phone_number varchar(255) not null,
    email        varchar(255) not null,
    created_at   timestamp    null,
    updated_at   timestamp    null
)
    collate = utf8mb4_unicode_ci;

create or replace table districts
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255)    not null,
    city_id    bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint districts_city_id_foreign
        foreign key (city_id) references cities (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

create or replace table addresses
(
    id          bigint unsigned auto_increment
        primary key,
    street      varchar(255)    null,
    postal_code varchar(255)    not null,
    district_id bigint unsigned not null,
    created_at  timestamp       null,
    updated_at  timestamp       null,
    constraint addresses_district_id_foreign
        foreign key (district_id) references districts (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

create or replace table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                          not null,
    connection text                                  not null,
    queue      text                                  not null,
    payload    longtext                              not null,
    exception  longtext                              not null,
    failed_at  timestamp default current_timestamp() not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create or replace table health_statuses
(
    id                 bigint unsigned auto_increment
        primary key,
    vaccination        tinyint(1) not null,
    internal_parasite  tinyint(1) not null,
    external_parasite  tinyint(1) not null,
    health_description text       not null,
    created_at         timestamp  null,
    updated_at         timestamp  null
)
    collate = utf8mb4_unicode_ci;

create or replace table job_batches
(
    id             varchar(255) not null
        primary key,
    name           varchar(255) not null,
    total_jobs     int          not null,
    pending_jobs   int          not null,
    failed_jobs    int          not null,
    failed_job_ids longtext     not null,
    options        mediumtext   null,
    cancelled_at   int          null,
    created_at     int          not null,
    finished_at    int          null
)
    collate = utf8mb4_unicode_ci;

create or replace table jobs
(
    id           bigint unsigned auto_increment
        primary key,
    queue        varchar(255)     not null,
    payload      longtext         not null,
    attempts     tinyint unsigned not null,
    reserved_at  int unsigned     null,
    available_at int unsigned     not null,
    created_at   int unsigned     not null
)
    collate = utf8mb4_unicode_ci;

create or replace index jobs_queue_index
    on jobs (queue);

create or replace table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create or replace table password_reset_tokens
(
    email      varchar(255) not null
        primary key,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create or replace table pet_types
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create or replace table pet_breeds
(
    id         bigint unsigned auto_increment
        primary key,
    type_id    bigint unsigned not null,
    name       varchar(255)    not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint pet_breeds_type_id_foreign
        foreign key (type_id) references pet_types (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

create or replace table sessions
(
    id            varchar(255)    not null
        primary key,
    user_id       bigint unsigned null,
    ip_address    varchar(45)     null,
    user_agent    text            null,
    payload       longtext        not null,
    last_activity int             not null
)
    collate = utf8mb4_unicode_ci;

create or replace index sessions_last_activity_index
    on sessions (last_activity);

create or replace index sessions_user_id_index
    on sessions (user_id);

create or replace table statuses
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create or replace table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(255) not null,
    surname           varchar(255) null,
    email             varchar(255) not null,
    email_verified_at timestamp    null,
    password          varchar(255) not null,
    role              varchar(255) null,
    remember_token    varchar(100) null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;

create or replace table messages
(
    id         bigint unsigned auto_increment
        primary key,
    user_id    bigint unsigned null,
    name       varchar(255)    not null,
    email      varchar(255)    not null,
    subject    varchar(255)    not null,
    content    text            not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint messages_user_id_foreign
        foreign key (user_id) references users (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

create or replace table pets
(
    id               bigint unsigned auto_increment
        primary key,
    name             varchar(255)    not null,
    breed_id         bigint unsigned not null,
    age              varchar(255)    not null,
    gender           varchar(255)    not null,
    health_status_id bigint unsigned not null,
    user_id          bigint unsigned not null,
    created_at       timestamp       null,
    updated_at       timestamp       null,
    constraint pets_breed_id_foreign
        foreign key (breed_id) references pet_breeds (id)
            on update cascade on delete cascade,
    constraint pets_health_status_id_foreign
        foreign key (health_status_id) references health_statuses (id)
            on update cascade on delete cascade,
    constraint pets_user_id_foreign
        foreign key (user_id) references users (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

create or replace table ads
(
    id          bigint unsigned auto_increment
        primary key,
    user_id     bigint unsigned not null,
    pet_id      bigint unsigned not null,
    title       varchar(255)    not null,
    description text            not null,
    status_id   bigint unsigned not null,
    address_id  bigint unsigned not null,
    created_at  timestamp       null,
    updated_at  timestamp       null,
    image_url   varchar(255)    null,
    contact_id  bigint unsigned not null,
    constraint ads_address_id_foreign
        foreign key (address_id) references addresses (id)
            on update cascade on delete cascade,
    constraint ads_contact_id_foreign
        foreign key (contact_id) references contact (id)
            on delete cascade,
    constraint ads_pet_id_foreign
        foreign key (pet_id) references pets (id)
            on update cascade on delete cascade,
    constraint ads_status_id_foreign
        foreign key (status_id) references statuses (id)
            on update cascade on delete cascade,
    constraint ads_user_id_foreign
        foreign key (user_id) references users (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

create or replace table favorite_ads
(
    id         bigint unsigned auto_increment
        primary key,
    user_id    bigint unsigned not null,
    ad_id      bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint favorite_ads_ad_id_foreign
        foreign key (ad_id) references ads (id)
            on update cascade on delete cascade,
    constraint favorite_ads_user_id_foreign
        foreign key (user_id) references users (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

create or replace table training_infos
(
    id            bigint unsigned auto_increment
        primary key,
    pet_id        bigint unsigned not null,
    training_type varchar(255)    not null,
    start_date    timestamp       null,
    end_date      timestamp       null,
    trainer_name  varchar(255)    null,
    comments      text            null,
    constraint training_infos_pet_id_foreign
        foreign key (pet_id) references pets (id)
            on update cascade on delete cascade
)
    collate = utf8mb4_unicode_ci;

