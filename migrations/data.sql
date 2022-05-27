CREATE TABLE IF NOT EXISTS "user" (
    id serial primary key,
    username text,
    email text,
    password text
);

CREATE TABLE IF NOT EXISTS task (
    id serial primary key,
    text text,
    user_id int references "user" (id)
)