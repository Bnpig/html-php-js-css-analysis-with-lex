%option noyywrap
%{
#include <bits/stdc++.h>
#include "layerVar.h"
#include <string>
#include <iostream>
#include <cstdio>
#include <dirent.h>
using namespace std;

vector<string> variable;
map<string,int> variable_count;

//
//
//
stack<layerVar> layer;
bool availableCh(char c);
void addVarCnt(string v);
%}

onelinecc ^([ ]*\/\/)(.)*
multilinecc \/\*(\*[^/]|[^/])*\*\/
debug \{(.)+\}
forst for[ ]*\([ ]*\$[a-zA-Z_0-9]*[ ]*=[a-zA-Z_0-9 ]*\;[^\;]*\;[^\)]*\)[ \n\r\t]*\{
whilest while[ ]*\([ ]*\$[a-zA-Z_0-9]+[ ]*\=[ ]*(.)+[ ]*\)[ \n\r\t]*\{
foreachst foreach[ ]*\([ ]*\$[a-zA-Z_0-9]+[ ][ ]*as[ ]*[^\)]+[ ]*\)[ \n\r\t]*\{
variable \$[a-zA-Z_0-9]+
dot .|[\n\r\t ]
debug1 \"(.)*\{(.)*\"
debug2 \"(.)*\}(.)*\"
func function[ ][^)]*[ ]*\([^{]*\)[^\{]*\{

%%
{onelinecc} {

}
{multilinecc} {

}
{func} {
    string content = YYText();
    string fname = string(content.begin(),content.begin()+content.find("("));
    cout << fname << "()" << endl;
    layerVar nlv = layer.top().nextLayer();
    if (content.find("()") == string::npos){
        //with variable;
        
        auto nextv = content.find("$")+1;
        while(nextv != string::npos){
            string vb("");
            for(;availableCh(content[nextv]);nextv++) vb.push_back(content[nextv]);
            nlv.addVariable(vb);
            addVarCnt(vb);
            nextv = content.find("$",nextv) != string::npos ? content.find("$",nextv) +1: content.find("$",nextv);
        }
    }
    layer.push(nlv);
}
{debug} {

}
{forst} {
    layerVar nlv = layer.top().nextLayer();
    string content = YYText();
    string vb = string(content.begin()+content.find("$")+1,content.begin()+content.find("=",content.find("$")+1) );
    
    nlv.addVariable(vb);
    addVarCnt(vb);
    layer.push(nlv);
}
{whilest} {
    layerVar nlv = layer.top().nextLayer();
    string content = YYText();
    string vb = string(content.begin()+content.find("$")+1,content.begin()+content.find("=",content.find("$")+1) );
    
    nlv.addVariable(vb);
    addVarCnt(vb);
    layer.push(nlv);
}
{foreachst} {
    string content = YYText();
    auto afteras = content.find("as");
    layerVar nlv = layer.top().nextLayer();
    if (content.find("=>",afteras+1) != string::npos){
        //2 variable
        auto vbst1 = content.find("$",afteras+1);
        auto vbend1 = content.find(" ",vbst1);
        string vb1 = string(content.begin()+vbst1+1,content.begin()+vbend1);
        
        auto vbst2 = content.find("$",vbend1+1);
        auto vbend2 = content.find(")",vbst2);
        string vb2 = string(content.begin()+vbst2+1,content.begin()+vbend2);
        
        nlv.addVariable(vb1);
        nlv.addVariable(vb2);
        addVarCnt(vb1);
        addVarCnt(vb2);
    }else{
        auto vbst = content.find("$",afteras+1);
        string vb = string(content.begin()+vbst+1,content.begin()+content.find(")",vbst));
        
        nlv.addVariable(vb);
        addVarCnt(vb);
    }
    layer.push(nlv);
}
{variable} {
    string content = YYText();
    string vb = string(content.begin()+1,content.end());
    layer.top().addVariable(vb);
    addVarCnt(vb);
}
\{ {
    layerVar nlv = layer.top().nextLayer();
    layer.push(nlv);
}
{debug1} {

}
{debug2} {

}
\} {
    for(int i = 0 ; i < layer.top().getLayer()-1; i++){
        cout << "    ";
    }
    cout << "\}" << endl;
    layer.pop();
}
{dot} {

}
%%
#include <fstream>

bool availableCh(char c){
    if (c >= 'a' && c <= 'z') return 1;
    if (c >= 'A' && c <= 'Z') return 1;
    if (c >= '0' && c <= '9') return 1;
    if (c == '_') return 1;
    return 0;
}
void addVarCnt(string v){
    while(v.find(" ") != string::npos) v.erase(v.begin()+v.find(" "));
    if (variable_count.find(v) == variable_count.end()){
        variable.push_back(v);
        variable_count[v] = 1;
    }else variable_count[v]++;
}
int main( int argc, char **argv )
{
   FlexLexer* lexer;

    struct dirent *entry;
    DIR *dp;
    dp = ::opendir(string("result/").c_str());
    vector<string> s;
    while(entry = ::readdir(dp)){
        string name = string(entry->d_name);
        if (name.find(".php") != string::npos && name.find("index") == string::npos){
            s.push_back(name);
        }
    }
    layer.push(layerVar());
    sort(s.begin(),s.end());
    for(auto i:s){
        //cout << i << endl;
        std::ifstream input;
        input.open("result/"+i,std::ifstream::in);
        lexer = new yyFlexLexer( &input, &std::cout );
        while( lexer->yylex() != 0 );
    }
    cout << "=======tree=======" << endl;
    for(auto i : variable){
        cout << i << " : " << variable_count[i] << endl;
    }
    cout << "=======count=======" << endl;
    return 0;
}