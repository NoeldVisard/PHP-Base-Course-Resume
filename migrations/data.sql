CREATE TABLE IF NOT EXISTS "user" (
    id serial primary key,
    username text,
    email text,
    password text
);

CREATE TABLE IF NOT EXISTS resume (
    id serial primary key,
    user_id int,
    telegram text,
    phone text,
    skills text,
    experience text,
    education text,
    courses text,
    projects text
)