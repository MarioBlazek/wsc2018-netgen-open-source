<?php /* #?ini charset="utf-8"?

[ImageMagick]
Filters[]=thumb=-resize 'x%1' -resize '%1x<' -resize 50%
Filters[]=centerimg=-gravity center -crop %1x%2+0+0 +repage
Filters[]=strip=-strip

[AliasSettings]
AliasList[]

# Netgen specific, should not appear in administration

AliasList[]=ng_image_full
AliasList[]=ng_image_line
AliasList[]=ng_image_embed
AliasList[]=ng_image_block_item
AliasList[]=gallerylarge
AliasList[]=galleryfull

AliasList[]=imagefull
AliasList[]=i320
AliasList[]=i480
AliasList[]=i770
AliasList[]=i960
AliasList[]=i1540

# Used as a preview in eZ Online Editor

AliasList[]=medium

[ng_image_full]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=1170

[ng_image_line]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=330

[ng_image_embed]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=330

[ng_image_block_item]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=330

[gallerylarge]
Reference=original
Filters[]
Filters[]=geometry/scalewidth=770

[galleryfull]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=1800

[imagefull]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=1000

[i320]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=320

[i480]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=480

[i770]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=770

[i960]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=960

[i1540]
Reference=original
Filters[]
Filters[]=geometry/scalewidthdownonly=1540
*/ ?>
