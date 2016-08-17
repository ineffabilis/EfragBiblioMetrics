<?php
/**
 * Copyright (C) 2016 Eleni Fragkiadaki
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Efrag\Lib\BiblioMetrics\Tests\MSO;

use Efrag\Lib\BiblioMetrics\MSO\MSOAuthorGsDefinition;
use Efrag\Lib\BiblioMetrics\Tests\Fixtures\GraphC;

class MSOAuthorGsDefinitionTest extends \PHPUnit_Framework_TestCase
{
    use GraphC;

    public function testMSOTable()
    {
        $mso = new MSOAuthorGsDefinition();
        $table = $mso
            ->setPaperCitations($this->graphC['citations'])
            ->setPaperAuthors($this->graphC['paper_authors'])
            ->setDepth(3)
            ->getMSO();

        $expected = [
            1 => [
                1 => [1 => 3, 2 => 0, 3 => 1],
                2 => [1 => 2, 2 => 1, 3 => 0],

            ],
            2 => [
                3 => [1 => 1, 2 => 0, 3 => 0]
            ],
            3 => [
                3 => [1 => 1, 2 => 1, 3 => 0],
                4 => [1 => 1, 2 => 2, 3 => 0],
            ],
            4 => [
                2 => [1 => 0, 2 => 1, 3 => 0],
                4 => [1 => 1, 2 => 2, 3 => 0],
            ],
            5 => [
                1 => [1 => 0, 2 => 0, 3 => 0],
                5 => [1 => 0, 2 => 0, 3 => 0]
            ],
            6 => [
                1 => [1 => 1, 2 => 0, 3 => 0],
                2 => [1 => 1, 2 => 0, 3 => 0]
            ],
            7 => [
                2 => [1 => 0, 2 => 0, 3 => 0],
                3 => [1 => 0, 2 => 0, 3 => 0]
            ]
        ];

        $this->assertEquals($expected, $table, 'The MSO table does not match');
    }
}
