# PHPViewLanguageAPI

ViewLanguage is a markup language designed to eliminate scripting in views. This is achieved by:
- interfacing scripting variables, through expressions. 
	Example:
	My ip is: ${request.client.ip}.
- interfacing scripting logics, through tags.
	Example:
	<standard:foreach var="${request.client}" key="${keyName}" value="${valueName}">
	    Value for ${keyName} is ${valueName}.
	</standard:foreach>

The most elegant solution for keeping views scriptless, as employed by JSP applications, is to have all scripting replaced by a language that functions as an extension of HTML. Via plugins, tags will be internally translated into relevant programming language code when output is being constructed. This insures views are not only programming-language independent, but also framework independent, which means their data can be interpreted in endless fashions, according to one’s particular needs. Regardless of view language employed, the logic how plugins work stays the same:

1. Builds response based on request.
2. Calls plugin to translate view language code from response into native programming language code.
3. Displays response.

Full documentation:
https://docs.google.com/document/d/17L3zxp8COTfogACORDYZEWc8Wiu9giY1yMTpKv3avgA/edit#