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
//
stack<layerVar> layer;
bool availableCh(char c);
void addVarCnt(string v);
%}

dot .|[\n\r\t ]
variable var[ ]*([^\;])*\;(\n)?
func function[^)]*[ ]*\(([^{])*\)[^{]*\{
%%
{func} {
    string content = YYText();
    string fname = string(content.begin(),content.begin()+content.find("("));
    cout << fname << "()" << endl;
    layerVar nlv = layer.top().nextLayer();
    if (content.find("()") == string::npos){
        //with variable;
        
        auto nextv = content.find("(")+1;
        while(nextv < content.size()){
            for(;(content[nextv] == '\n' || isspace(content[nextv]) || content[nextv] == ',') && nextv < content.size() ;nextv++);
            string vb("");
            for(;availableCh(content[nextv]) && nextv < content.size() ;nextv++) vb.push_back(content[nextv]);
            nlv.addVariable(vb);
            addVarCnt(vb);
            for(;(content[nextv] == '\n' || isspace(content[nextv]) || content[nextv] == ',') && nextv < content.size() ;nextv++);
            if (content[nextv] == ')') break;
        }
    }
    layer.push(nlv);
}
{variable} {
    stack<char> st;
    string variable;
    string content = YYText();
    auto nextv = content.find("var")+4;
    while(nextv < content.size()){
        string vb("");
        for(;availableCh(content[nextv]);nextv++) vb.push_back(content[nextv]);
        layer.top().addVariable(vb);
        addVarCnt(vb);
        for(;  !(st.empty() && content[nextv] == ',')  && nextv < content.size();nextv++){
            if (content[nextv] == '{' || content[nextv] == '(') st.push('{');
            else if (content[nextv] == '}' || content[nextv] == ')') st.pop();
        }
        nextv++;
        for(;content[nextv] == '\n' || isspace(content[nextv]);nextv++);
    }
}
\{ {
    layerVar nlv = layer.top().nextLayer();
    layer.push(nlv);
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
        if (name.find(".js") != string::npos && name.find("index") == string::npos){
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