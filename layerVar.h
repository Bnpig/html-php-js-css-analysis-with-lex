#ifndef _GUOJTIM_LV
#define _GUOJTIM_LV 1

#include <algorithm>
#include <iostream>
#include <fstream>
#include <string>
#include <vector>
using namespace std;

class layerVar{
	public:
        vector<string> vars;
        int layer;
        layerVar(){
            layer = 0;
            vars = vector<string>();
        }
        layerVar nextLayer(){
            layerVar nt = layerVar();
            nt.layer = layer +1 ;
            for(int i = 0 ; i < layer;i++) cout << "    ";
            cout << "{" << endl;
            nt.vars = vector<string>(vars);
            return nt;
        }
        void addVariable(string v){
            while(v.find(" ") != string::npos) v.erase(v.begin()+v.find(" "));
            if (find(vars.begin(),vars.end(),v) == vars.end()){
                for(int i = 0 ; i < layer;i++) cout << "    ";
                cout << v <<endl;
                vars.push_back(v);
            }
        }
        int getLayer(){
            return layer;
        }
};
#endif