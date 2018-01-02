/*
* jQuery djax
*
* @version v0.122
*
* Copyright 2012, Brian Zeligson
* Released under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
*
* Homepage:
*   http://beezee.github.com/djax.html
*
* Authors:
*   Brian Zeligson
*
* Contributors:
*  Gary Jones @GaryJones
*
* Maintainer:
*   Brian Zeligson github @beezee
*
*/

(function($,exports){'use strict';$.fn.djax=function(selector,exceptions,replaceBlockWithFunc){if(!history.pushState){return $(this);}
var self=this,blockSelector=selector,excludes=(exceptions&&exceptions.length)?exceptions:[],replaceBlockWith=(replaceBlockWithFunc)?replaceBlockWithFunc:$.fn.replaceWith,djaxing=false;window.history.replaceState({'url':window.location.href,'title':$('title').text()},$('title').text(),window.location.href);self.clearDjaxing=function(){self.djaxing=false;};self.attachClick=function(element,event){var link=$(element),exception=false;$.each(excludes,function(index,exclusion){if(link.attr('href').indexOf(exclusion)!==-1){exception=true;}
if(link.data('djax-exclude')===true){exception=true;}
if(link.attr('href').indexOf('.pdf')!==-1||link.attr('href').indexOf('.doc')!==-1||link.attr('href').indexOf('.odt')!==-1){exception=true;}
if(window.location.href.indexOf(exclusion)!==-1){exception=true;}});if(exception){return $(element);}
event.preventDefault();if(self.djaxing){setTimeout(self.clearDjaxing,1000);return $(element);}
$(window).trigger('djaxClick',[element]);self.reqUrl=link.attr('href');self.triggered=false;self.navigate(link.attr('href'),true);};self.navigate=function(url,add){var blocks=$(blockSelector);self.djaxing=true;$(window).trigger('djaxLoading',[{'url':url}]);var replaceBlocks=function(response){if(url!==self.reqUrl){self.navigate(self.reqUrl,false);return true;}
var result=$(response),newBlocks=$(result).find(blockSelector);if(add){window.history.pushState({'url':url,'title':$(result).filter('title').text()},$(result).filter('title').text(),url);}
$('title').text($(result).filter('title').text());blocks.each(function(){var id='#'+$(this).attr('id'),newBlock=newBlocks.filter(id),block=$(this);$('a',newBlock).filter(function(){return this.hostname===location.hostname;}).addClass('dJAX_internal').on('click',function(event){return self.attachClick(this,event);});if(newBlock.length){if(block.html()!==newBlock.html()){replaceBlockWith.call(block,newBlock);}}else{block.remove();}});$.each(newBlocks,function(){var newBlock=$(this),id='#'+$(this).attr('id'),$previousSibling;if(!$(id).length){$previousSibling=$(result).find(id).prev();if($previousSibling.length){newBlock.insertAfter('#'+$previousSibling.attr('id'));}else{newBlock.prependTo('#'+newBlock.parent().attr('id'));}}
$('a',newBlock).filter(function(){return this.hostname===location.hostname;}).addClass('dJAX_internal').on('click',function(event){return self.attachClick(this,event);});});if(!self.triggered){$(window).trigger('djaxLoad',[{'url':url,'title':$(result).filter('title').text(),'response':response}]);self.triggered=true;self.djaxing=false;}};$.get(url,function(response){replaceBlocks(response);}).error(function(response){replaceBlocks(response['responseText']);});};$(this).find('a').filter(function(){return this.hostname===location.hostname;}).addClass('dJAX_internal').on('click',function(event){return self.attachClick(this,event);});$(window).bind('popstate',function(event){self.triggered=false;if(event.originalEvent.state){self.reqUrl=event.originalEvent.state.url;self.navigate(event.originalEvent.state.url,false);}});};}(jQuery,window));
