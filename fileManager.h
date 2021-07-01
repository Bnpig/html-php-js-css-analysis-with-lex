#ifndef _GUOJTIM_GENERATOR
#define _GUOJTIM_GENERATOR 1

#include <iostream>
#include <fstream>
#include <string>
using namespace std;

class fileManager{
	public:
		string filename;
		fileManager(string filename):filename(filename){
			ofstream reset(filename);
			reset << "";
			reset.close();
		}
		
		void addText(string s){
			ofstream add(filename,std::ios::app);
			add << s;
			add.close();
		}
};


#endif