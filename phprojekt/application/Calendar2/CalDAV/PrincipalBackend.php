<?php
/**
 * Calendar2 Caldav Principal Backend
 *
 * This software is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License version 3 as published by the Free Software Foundation
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * @category   PHProjekt
 * @package    Application
 * @subpackage Calendar2
 * @copyright  Copyright (c) 2010 Mayflower GmbH (http://www.mayflower.de)
 * @license    LGPL v3 (See LICENSE file)
 * @link       http://www.phprojekt.com
 * @since      File available since Release 6.1
 * @author     Simon Kohlmeyer <simon.kohlmeyer@mayflower.de>
 */

/**
 * Calendar2 Caldav Principal Backend
 *
 * This class implements a principan backend for sabredav
 *
 * @category   PHProjekt
 * @package    Application
 * @subpackage Calendar2
 * @copyright  Copyright (c) 2011 Mayflower GmbH (http://www.mayflower.de)
 * @license    LGPL v3 (See LICENSE file)
 * @link       http://www.phprojekt.com
 * @since      File available since Release 6.1.0
 * @author     Simon Kohlmeyer <simon.kohlmeyer@mayflower.de>
 */
class Calendar2_CalDAV_PrincipalBackend implements Sabre_DAVACL_IPrincipalBackend
{
    public function getPrincipalsByPrefix($prefixPath)
    {
        // TODO: Implement me
        throw new Exception('not implemented. $prefixPath = ' . $prefixPath);
        return array();
    }

    public function getPrincipalByPath($path)
    {
        $user = new Phprojekt_User_User();
        $user = $user->findByUsername(preg_filter('|.*principals/([^/]+)$|', '$1', $path));
        if (is_null($user)) {
            throw new Exception("Principal not found for path $path");
        }

        return array(
            'id'                => $user->id,
            'uri'               => "principals/{$user->username}",
            '{DAV:}displayname' => $user->username,
            '{http://sabredav.org/ns}email-address' => $user->getSetting('email')
        );
    }

    public function getGroupMemberSet($principal)
    {
        // TODO: Implement me
        throw new Exception('not implemented. $principal = ' . $principal);
    }

    public function getGroupMembership($principal)
    {
        // TODO: Implement me
        return array();
    }

    public function setGroupMemberSet($principal, array $members)
    {
        // TODO: Implement me
        throw new Exception('not implemented3. $principal = ' . $principal);
    }

    public function updatePrincipal($path, $mutations)
    {
        return false;
    }

    public function searchPrincipals($prefixPath, array $searchProperties)
    {
        return array();
    }
}
