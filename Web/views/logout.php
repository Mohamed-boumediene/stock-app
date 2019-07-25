<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 16:51
 */

session_start();

if(session_destroy()) {
    header("Location: index.html");
}