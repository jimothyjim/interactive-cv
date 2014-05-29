#-README-
##--Introduction--
This is the source code for the site I created specifically for the Toolstation job application. The site is powered by Yii framework and these files have been included here for reference and ease of access, though 
some senstitive items like config have been removed. The idea of this site is somewhat superfluous and is currently more of a tech demo than a product intended for real world use. The site is used to create
a database of skills which can then be browsed by an end user, who then picks the skills which are used to generate a CV. 

##--List of Existing Features--
This is a list of the things the site currently can do

~Create, update, and delete skills from the database with a CMS (admin only)

~Filter skills by category or tag

~Add and remove individual skills from the skills cart

~Add all results on a page to the skills cart

~Add real CV skills to the skills cart

~Empty skills cart

~Generate CV based on skills in the skills cart

~Send an email to the admin via a contact form

~Not really a feature but it also displays additional info like my portfolio

##--Possible Improvements--
###---Minor and Ongoing Improvements ---
~Continued eradication of spelling and grammar errors

~Rewriting code to be more human readable or more efficient

~Add category and tag linking to skills

~Essentially recreate the browser back button so after adding an item users see "to return to the skills you were browsing click here!"


###---Reasonable Improvements - Things that could take a while but are realistic for me to implement within the current scope---
~Add a proper search

~Find some way of improving CV generation so that no HTML is needed in the database  to geerate a nice looking CV. This is a priority but also potentially a very awkward improvement

~Add a way to create new tags using CMS, preferably on the skill creation form so you can add new tags when you need them. Probably javascript needed to make this work in a non-horrible way.

~Improve CV generation so CV priority is handled better and at the very least, doesn't require you to remember existing skill priorities and then update multiple skills should you want to change the order

~Improve CV generation so you can choose the order of categories


###---Potential Future Improvements - Things that would require much more time and effort, or are beyond the current project scope---
~Seperate the CV functionality from my online portfolio completly

~Allow users to register and input their own skills and generate their own CVs

~WYSIWYG editing of the CV after the initial generation

~Much smarter CV generation in general

~Spellcheck, grammar check


###---Future Expansion of The Idea Itself - Things that are plausible, but would require making this a full time business and probably a lot of luck/outside influence. Mostly theoretical---
~Find out what makes a good CV for specific jobs (as in, a web dev job probably wants to know your web skills) and be able to suggest what type of skills users should be looking to include based on the job they are applying for.

~Integrate with other websites (namely job sites) so people don't need to even know that this isn't it's own thing, as far as they know it's part of the job site itself and not an outside party (technically speaking, legally speaking
they probably need to know)

~Ways of sharing or even rating CVs so people can come to the site to see what a good application likes like before creating their own, and also have other people peer review their CV. Depending on the community that springs up around it, this might be more harmful than hinderance but I can't really control people on the Internet, at least not yet...


