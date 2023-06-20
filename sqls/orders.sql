create table orders
(
    order_id     int primary key auto_increment comment "order Id",
    order_cost   float,
    order_time   date,
    order_status varchar(20)
)
