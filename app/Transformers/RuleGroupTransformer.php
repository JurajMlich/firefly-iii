<?php
/**
 * RuleGroupTransformer.php
 * Copyright (c) 2018 thegrumpydictator@gmail.com
 *
 * This file is part of Firefly III.
 *
 * Firefly III is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Firefly III is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Firefly III. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace FireflyIII\Transformers;

use FireflyIII\Models\RuleGroup;
use Log;

/**
 * Class RuleGroupTransformer
 */
class RuleGroupTransformer extends AbstractTransformer
{
    /**
     * RuleGroupTransformer constructor.
     *
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        if ('testing' === config('app.env')) {
            Log::warning(sprintf('%s should not be instantiated in the TEST environment!', \get_class($this)));
        }
    }

    /**
     * Transform the rule group
     *
     * @param RuleGroup $ruleGroup
     *
     * @return array
     */
    public function transform(RuleGroup $ruleGroup): array
    {
        $data = [
            'id'          => (int)$ruleGroup->id,
            'created_at'  => $ruleGroup->created_at->toAtomString(),
            'updated_at'  => $ruleGroup->updated_at->toAtomString(),
            'title'       => $ruleGroup->title,
            'description' => $ruleGroup->description,
            'order'       => $ruleGroup->order,
            'active'      => $ruleGroup->active,
            'links'       => [
                [
                    'rel' => 'self',
                    'uri' => '/rule_groups/' . $ruleGroup->id,
                ],
            ],
        ];

        return $data;
    }


}


