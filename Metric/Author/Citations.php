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

namespace Efrag\Lib\BiblioMetrics\Metric\Author;

use Efrag\Lib\BiblioMetrics\Metric\AuthorMetric;

class Citations extends AuthorMetric
{

    /**
     * @return bool
     */
    protected function isInitialized()
    {
        return isset($this->paperCitations) && isset($this->authorPapers);
    }

    /**
     * @return array
     */
    protected function generateScores()
    {
        $scores = array();

        foreach ($this->authorPapers as $authorId => $paperList) {
            $authorPaperCitations = 0;

            foreach ($paperList as $paperId) {
                $authorPaperCitations += count($this->paperCitations[$paperId]);
            }

            $scores[$authorId] = $authorPaperCitations;
        }

        return $scores;
    }
}
