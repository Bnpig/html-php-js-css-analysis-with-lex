%option noyywrap
%{
#include <bits/stdc++.h>
#include <string>
#include <iostream>
#include <cstdio>
#include <dirent.h>
using namespace std;
map<string,int> cnt;
vector<string> keys;
stack<string> layer;
string currenttag;

map<string,vector<string>> tagMem;
vector<string> recordList;

vector<string> links;
vector<string> debugList{"br","input","meta","link","!DOCTYPE"};
%}
onlyone <[^\/](<[^\/]|[^<])*\/>
start <[^?](\?>|[^>])*>
end <\/([^<])*>

%%
{onlyone} {
    string content = YYText();
    int ele_end = (content.find(" ") != string::npos ? content.find(" ") : content.find(">"));
    string tag = string(content.begin()+1,content.begin()+ele_end);
    if (cnt.find(tag) == cnt.end()) {
        cnt[tag] = 1;
        keys.push_back(tag);
    }
    else cnt[tag]++;

    currenttag = tag;

    for(int i = 0 ; i < layer.size();i++) cout << "    ";
    cout << "<" << tag << ">" << endl;
}
{end} {
    string content = YYText();
    int ele_end = (content.find(" ") != string::npos ? content.find(" ") : content.find(">"));
    string tag = string(content.begin()+2,content.begin()+ele_end);
    if (!layer.empty()) layer.pop();
    currenttag = layer.empty() ? "" : layer.top();
}
{start} {
    string content = YYText();
    if (string(content.begin(),content.begin()+4) == "<?php") return 1;// when find <?php ... ?>
    int ele_end = (content.find(" ") != string::npos ? content.find(" ") : content.find(">"));
    string tag = string(content.begin()+1,content.begin()+ele_end);
    if (cnt.find(tag) == cnt.end()) {
        cnt[tag] = 1;
        keys.push_back(tag);
    }
    else cnt[tag]++;

    

    for(int i = 0 ; i < layer.size();i++) cout << "    ";
    cout << "<" << tag << ">" << endl;

    if (find(debugList.begin(),debugList.end(),tag) != debugList.end()) return 1; 
    layer.push(tag);
    currenttag = tag;

    if (tag == "a"){
        if (content.find("href=\"") != string::npos) links.push_back(string(content.begin()+content.find("href")+6,content.begin()+content.find("\"",content.find("href")+6)));
        else links.push_back(string(content.begin()+content.find("href")+6,content.begin()+content.find("\'",content.find("href")+6)));
    }
    if (find(recordList.begin(),recordList.end(),currenttag) != recordList.end()){
        if (tagMem.find(currenttag) == tagMem.end()) tagMem[currenttag].push_back(string(""));
        if (tagMem[currenttag].size() < cnt[currenttag])tagMem[currenttag].push_back(string(""));
    }
} 
.|[\n\r \t] {
    if(find(recordList.begin(),recordList.end(),currenttag) != recordList.end()){
        tagMem[currenttag][cnt[currenttag]-1].push_back(YYText()[0]);
    }
}
%%
#include <fstream>


int main( int argc, char **argv )
{
   FlexLexer* lexer;
    recordList.push_back("title");
    recordList.push_back("label");
    recordList.push_back("a");

    struct dirent *entry;
    DIR *dp;
    dp = ::opendir(string("result/").c_str());
    vector<string> s;
    while(entry = ::readdir(dp)){
        string name = string(entry->d_name);
        if (name.find("index") != string::npos){
            s.push_back(name);
        }
    }
    sort(s.begin(),s.end());
    for(auto i:s){
        //cout << i << endl;
        std::ifstream input;
        input.open("result/"+i);
        cout << "read " << "result/" <<i << endl;
        lexer = new yyFlexLexer( &input, &std::cout );
        while( lexer->yylex() != 0 );
        cout << "eof" << endl;
    }
    cout << "=====tree=====" << endl;
    for(auto i : keys){
        cout << i << " : " << cnt[i] << endl;
    }
    cout << "=====count=====" << endl;
    for (auto i : recordList){
        for (auto j : tagMem[i]){
            cout << i << " has " << j << endl;
        }
    }
    cout << "=====tags=====" << endl;
    for (auto i : links){
        cout << i << endl;
    }
    cout << "=====links=====" << endl;
    return 0;
}