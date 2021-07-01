%option noyywrap
%{
#include "fileManager.h"
#include <string>
using std::cout;
fileManager indexphp("result/index.php");
int PHPtemp = 0;
int JStemp = 0;
int CSStemp = 0;
string getTemp(int &);
%}
dot .
any {dot}|[\n\t\r ]
phpCODE \<\?(\?[^>]|[^?])*\?\>
jsCODE <script((([^>])*[^s][^r][^c]=([^>]*))|[ ]*)>([^<]\/|[^\/])+<\/script>
cssCODE <style([^>]*)>([^<]\/|[^\/])+<\/style>


%%

{phpCODE} {
    string filename = "php"+getTemp(PHPtemp)+".php";
    fileManager phpsource("result/"+filename);
    indexphp.addText("<?php include '"+filename+"'; ?>");
    phpsource.addText(YYText());
}
{jsCODE} {
    string filename = "js"+getTemp(JStemp)+".js";
    fileManager jssource("result/"+filename);
    indexphp.addText("<script src='"+filename+"'>js</script>");
    string s = YYText();
    jssource.addText(string(s.begin()+s.find(">")+1,s.begin()+s.rfind("<")));

}
{cssCODE} {
    string filename = "css"+getTemp(CSStemp)+".css";
    fileManager csssource("result/"+filename);
    indexphp.addText("<link href='"+filename+"' rel='stylesheet'>");
    string s = YYText();
    csssource.addText(string(s.begin()+s.find(">")+1,s.begin()+s.rfind("<")));

}

{any} {
    indexphp.addText(YYText());
}

%%
#include <bits/stdc++.h>
#include <iostream>
#include <fstream>

string getTemp(int &type){
    char out[4];
    sprintf(out,"%03d",type++);
    return string(out);
}

int main( int argc, char **argv )
{
   std::ifstream input;
   FlexLexer* lexer;

   ++argv, --argc;
   //--- File input ---//
   if ( argc > 0 ){
       input.open(argv[0]);
       lexer = new yyFlexLexer( &input, &std::cout );
   }
   //--- Stdin ---//
   else{
       lexer = new yyFlexLexer;
   }

   while( lexer->yylex() != 0 );
   return 0;
}