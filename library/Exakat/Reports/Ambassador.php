<?php declare (strict_types = 1);
/*
 * Copyright 2012-2024 Damien Seguy – Exakat SAS <contact(at)exakat.io>
 * This file is part of Exakat.
 *
 * Exakat is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Exakat is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Exakat.  If not, see <http://www.gnu.org/licenses/>.
 *
 * The latest code can be found at <http://exakat.io/>.
 *
 */

namespace Exakat\Reports;

class Ambassador extends Emissary {
	const FILE_FILENAME  = 'ambassador';
	const FILE_EXTENSION = '';
	const CONFIG_YAML    = 'Ambassador';
	const TOPLIMIT       = 10;
	const LIMITGRAPHE    = 40;

	protected $compatibilities = [];

	public function __construct() {
		parent::__construct();

		foreach (array('74', '80', '81', '82', '83') as $shortVersion) {
		    $this->compatibilities[$shortVersion] = "Compatibility PHP $shortVersion[0].$shortVersion[1]";
		}

		$this->themesToShow = ['Analyze'];
	}

	public function dependsOnAnalysis(): array{
		return [
			'Security',
			'Performances',
			'ClassReview',
			'Dead code',
			'LintButWontExec',
		];
	}
}