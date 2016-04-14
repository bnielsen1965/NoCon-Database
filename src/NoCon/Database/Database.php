<?php

/*
 * Copyright (C) 2015 Bryan Nielsen - All Rights Reserved
 *
 * Author: Bryan Nielsen <bnielsen1965@gmail.com>
 *
 *
 * This file is part of the NoCon PHP application framework.
 * NoCon is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * NoCon is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this application.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace NoCon\Database;


/**
 * Database class provides basic database functions.
 * 
 * This class is used to provide basic database access functions in the NoCon
 * framework. Requires PHP PDO.
 * 
 * @author Bryan Nielsen <bnielsen1965@gmail.com>
 * @copyright (c) 2016, Bryan Nielsen
 * 
 */
class Database {

    /**
     * Get a PDO instance.
     * 
     * Database configuration settings include the following:
     * - OPTIONS: An array of options to be passed to PDO.
     * - TYPE: The database type for PDO.
     * - FILE: The filename and path when using sqlite database type.
     * - HOST: The database server hostname.
     * - NAME: The database name on the database server.
     * - USERNAME: The database server username.
     * - PASSWORD: The database server user password.
     * 
     * @param array $databaseConfig (optional) Database configuration.
     * @return \PDO
     */
    public static function getPDO($databaseConfig = null) {
        // load database configuration if not provided in call
        if ( empty($databaseConfig) ) {
            $databaseConfig = \NoCon\Framework\Config::get('database');
        }
        
        // establish database connection
        $options = (isset($databaseConfig['OPTIONS']) ? $databaseConfig['OPTIONS'] : array());
        switch ($databaseConfig['TYPE']) {
            case 'sqlite':
                $connectString = $databaseConfig['TYPE'] . ':' . $databaseConfig['FILE'];
                break;

            default:
                $connectString = $databaseConfig['TYPE'] . ':host=' . $databaseConfig['HOST'] . ';' . (empty($databaseConfig['NAME']) ? '' : 'dbname=' . $databaseConfig['NAME'] . ';');
                break;
        }
        return new \PDO($connectString, $databaseConfig['USERNAME'], $databaseConfig['PASSWORD'], $options);
    }

}
