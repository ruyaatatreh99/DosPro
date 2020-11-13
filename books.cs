using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Books
{
    #region Books
    public class Books
    {
        #region Member Variables
        protected int _id;
        protected string _name;
        protected int _cost;
        protected int _quntity;
        protected unknown _created_at;
        protected unknown _updated_at;
        #endregion
        #region Constructors
        public Books() { }
        public Books(string name, int cost, int quntity, unknown created_at, unknown updated_at)
        {
            this._name=name;
            this._cost=cost;
            this._quntity=quntity;
            this._created_at=created_at;
            this._updated_at=updated_at;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual int Cost
        {
            get {return _cost;}
            set {_cost=value;}
        }
        public virtual int Quntity
        {
            get {return _quntity;}
            set {_quntity=value;}
        }
        public virtual unknown Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual unknown Updated_at
        {
            get {return _updated_at;}
            set {_updated_at=value;}
        }
        #endregion
    }
    #endregion
}