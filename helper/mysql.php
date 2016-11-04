<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-22
 * Time: 16:49
 */

function connect($host, $user, $pwd, $name, $charset)
{
    $conn = mysqli_connect($host, $user, $pwd);
    if (!$conn) {
        return false;
    }
    if (!mysqli_select_db($conn, $name)) {
        return false;
    }
    mysqli_set_charset($conn, $charset);

    return $conn;
}

//查询返回一个字段
function select_returnone($conn, $table, $ziduan, $where = null, $orderby = null)
{
    $sql = "select $ziduan from $table";
    if ($where) {
        $sql .= " where $where";
    }
    if ($orderby) {
        $sql .= " order by $orderby";
    }
    /*echo $sql;*/
    /*    var_dump($sql);*/
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        return $row[0];
    } else {
        return false;
    }
}

//查询数据库
function db_select($conn, $table, $fields, $where = null, $orderby = null, $limit = null)
{
    if (is_array($fields)) {
        $fields = implode(',', $fields);
    }
    $sql = "select $fields from $table";
    if ($where) {
        $sql .= " where $where";
    }
    if ($orderby) {
        $sql .= " order by $orderby";
    }
    if ($limit) {
        $sql .= " limit $limit";

    }
    /*var_dump($sql);*/
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

//包装分页函数的查找
function db_selecttest($conn, $table, $fields, $where = null, $orderby = null, $limit = null)
{
    if (is_array($fields)) {
        $fields = implode(',', $fields);
    }
    $sql = "select $fields from $table";
    if ($where) {
        $sql .= " where $where";
    }
    if ($orderby) {
        $sql .= " order by $orderby";
    }
    if ($limit) {
        $sql .= " limit $limit";

    }
    /*echo $sql;*/
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

//删除数据
function db_deleted($conn, $table, $where)
{
    $sql = "delete from $table where $where";
    /*echo $sql;*/
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

//插入数据
function db_insert($conn, $table, $data)
{
    $keys = implode(',', array_keys($data));
    $values = implode(',', parse_value($data));
    $sql = "insert into $table($keys) values($values)";

    /*var_dump($sql);*/
    $result = mysqli_query($conn, $sql);
    /*var_dump($result);*/
    if ($result) {
        return mysqli_insert_id($conn);
    }
}

//更新数据、
function db_update($conn, $table, $set, $where)
{
    if (is_array($set)) {
        $set = implode(',', parse_set($set));
    }

    $sql = "update $table set $set where $where";
    /*echo $sql;*/
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    }
    return false;

}

function parse_set($set)
{
    foreach ($set as $key => $value) {
        $data[] = $key . '=' . parse_value($value);
    }
    return $data;

}

//插入更新数据函数的回调函数
function parse_value($data)
{
    if (is_string($data)) {
        $data = '\'' . $data . '\'';
    } else if (is_array($data)) {
        $data = array_map('parse_value', $data);
    } else if (is_null($data)) {
        $data = 'null';
    }
    return $data;
}

function db_txselect($conn, $table, $where)
{
    $sql = "select picture from $table where username = ";
    if (is_string($where)) {
        $where = '\'' . $where . '\'';
    }
    $sql .= "$where";
    /*    echo $sql;*/
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        return $row[0];
    } else {
        return false;
    }
}
